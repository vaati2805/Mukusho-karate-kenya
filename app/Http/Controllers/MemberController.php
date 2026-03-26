<?php

namespace App\Http\Controllers;

use App\Mail\NewRegistrationNotification;
use App\Mail\RegistrationConfirmationToUser;
use App\Models\Member;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    /**
     * Show the type chooser page (Kid vs Adult).
     */
    public function create()
    {
        return view('register-type');
    }

    /**
     * Show the kid registration form (with cart).
     */
    public function kidForm()
    {
        return view('register-kid');
    }

    /**
     * Show the adult registration form.
     */
    public function adultForm()
    {
        return view('register-adult');
    }

    /**
     * Store multiple kid registrations from the cart.
     */
    public function storeKids(Request $request)
    {
        $validated = $request->validate([
            'cart_data' => 'required|string',
            'guardian_name' => 'required|string|max:255',
            'guardian_phone' => 'required|string|max:20',
            'guardian_email' => 'required|email|max:255',
            'mpesa_phone' => 'required|string|max:20',
            'child_images' => 'nullable|array',
            'child_images.*' => 'nullable|image|max:3072',
        ]);

        $cart = json_decode($validated['cart_data'], true);

        if (empty($cart) || !is_array($cart)) {
            return back()->withErrors(['cart_data' => 'No children were added to the cart.']);
        }

        // Handle optional child images (matched by index)
        $childImages = $request->file('child_images', []);

        // Generate a shared group_id for this batch
        $groupId = time();
        $totalAmount = collect($cart)->sum(function ($child) {
            return floatval($child['amount'] ?? 1000);
        });

        // Simulate M-Pesa STK push for total
        $mpesaReceipt = $this->simulateMpesaStkPush($validated['mpesa_phone'], $totalAmount);

        foreach ($cart as $index => $child) {
            // Build date of birth from parts
            $dob = null;
            if (!empty($child['dob_year']) && !empty($child['dob_month']) && !empty($child['dob_day'])) {
                $dob = sprintf('%04d-%02d-%02d', $child['dob_year'], $child['dob_month'], $child['dob_day']);
            }

            // Use guardian email + index for unique email per child
            $childEmail = $index === 0
                ? $validated['guardian_email']
                : Str::before($validated['guardian_email'], '@') . '+child' . ($index + 1) . '@' . Str::after($validated['guardian_email'], '@');

            // Handle optional image for this child
            $imagePath = null;
            if (isset($childImages[$index]) && $childImages[$index]->isValid()) {
                $imagePath = $childImages[$index]->store('members', 'public');
            }

            $member = Member::create([
                'member_type' => 'kid',
                'full_name' => $child['full_name'] ?? 'Unknown',
                'email' => $childEmail,
                'image' => $imagePath,
                'phone' => $validated['guardian_phone'],
                'gender' => $child['gender'] ?? null,
                'date_of_birth' => $dob,
                'program' => 'kids',
                'school' => $child['school'] ?? null,
                'location' => $child['location'] ?? null,
                'club' => $child['club'] ?? null,
                'belt_rank' => 'White',
                'guardian_name' => $validated['guardian_name'],
                'guardian_phone' => $validated['guardian_phone'],
                'relationship' => $child['relationship'] ?? null,
                'group_id' => $groupId,
                'membership_fee' => 1000.00,
                'membership_paid' => true,
                'status' => 'active',
            ]);

            Payment::create([
                'member_id' => $member->id,
                'amount' => floatval($child['amount'] ?? 1000),
                'payment_type' => 'registration',
                'mpesa_receipt' => $mpesaReceipt,
                'mpesa_phone' => $validated['mpesa_phone'],
                'month_for' => now()->format('F Y'),
                'status' => 'completed',
                'transaction_date' => now(),
            ]);
        }

        $childCount = count($cart);
        $childNames = collect($cart)->pluck('full_name')->implode(', ');
        $club = $cart[0]['club'] ?? 'Not specified';

        // Send email notification to admin
        try {
            Mail::to(config('app.admin_email'))->send(new NewRegistrationNotification(
                memberType: 'kid',
                names: $childNames,
                count: $childCount,
                phone: $validated['guardian_phone'],
                club: $club,
                amount: $totalAmount,
                guardian: $validated['guardian_name'],
            ));
        } catch (\Exception $e) {
            Log::warning('Registration email notification failed: ' . $e->getMessage());
        }

        // Send confirmation email to the guardian
        try {
            Mail::to($validated['guardian_email'])->send(new RegistrationConfirmationToUser(
                memberType: 'kid',
                names: $childNames,
                count: $childCount,
                club: $club,
                amount: $totalAmount,
                guardian: $validated['guardian_name'],
            ));
        } catch (\Exception $e) {
            Log::warning('Registration user email notification failed: ' . $e->getMessage());
        }

        return redirect()->route('register.success')->with([
            'success' => "Registration successful! {$childCount} child(ren) registered. M-Pesa payment of KSH " . number_format($totalAmount) . " received.",
            'reg_notify' => [
                'type' => 'kid',
                'names' => $childNames,
                'count' => $childCount,
                'phone' => $validated['guardian_phone'],
                'guardian' => $validated['guardian_name'],
                'club' => $club,
                'amount' => $totalAmount,
            ],
        ]);
    }

    /**
     * Store adult registrations from the cart (one or more adults).
     */
    public function storeAdult(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|string|max:20',
            'gender' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'program' => 'required|string',
            'club' => 'required|string',
            'emergency_contact' => 'nullable|string|max:255',
            'emergency_phone' => 'nullable|string|max:20',
            'image' => 'nullable|image|max:3072',
            'mpesa_phone' => 'required|string|max:20',
            'amount' => 'required|numeric|min:100',
        ]);

        // Handle optional adult image
        $imagePath = null;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('members', 'public');
        }

        $totalAmount = floatval($validated['amount']);

        // Simulate M-Pesa STK push for total
        $mpesaReceipt = $this->simulateMpesaStkPush($validated['mpesa_phone'], $totalAmount);

        $member = Member::create([
            'member_type' => 'adult',
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'image' => $imagePath,
            'phone' => $validated['phone'],
            'gender' => $validated['gender'] ?? null,
            'date_of_birth' => !empty($validated['date_of_birth']) ? $validated['date_of_birth'] : null,
            'location' => $validated['location'] ?? null,
            'program' => $validated['program'],
            'club' => $validated['club'],
            'belt_rank' => 'White',
            'emergency_contact' => $validated['emergency_contact'] ?? null,
            'emergency_phone' => $validated['emergency_phone'] ?? null,
            'membership_fee' => 1000.00,
            'membership_paid' => true,
            'status' => 'active',
        ]);

        Payment::create([
            'member_id' => $member->id,
            'amount' => $totalAmount,
            'payment_type' => 'registration',
            'mpesa_receipt' => $mpesaReceipt,
            'mpesa_phone' => $validated['mpesa_phone'],
            'month_for' => now()->format('F Y'),
            'status' => 'completed',
            'transaction_date' => now(),
        ]);

        $label = '1 adult';
        $adultNames = $validated['full_name'];
        $club = $validated['club'];
        $phone = $validated['phone'];

        // Send email notification to admin
        try {
            Mail::to(config('app.admin_email'))->send(new NewRegistrationNotification(
                memberType: 'adult',
                names: $adultNames,
                count: 1,
                phone: $phone,
                club: $club,
                amount: $totalAmount,
            ));
        } catch (\Exception $e) {
            Log::warning('Registration email notification failed: ' . $e->getMessage());
        }

        // Send confirmation email to the member
        try {
            Mail::to($validated['email'])->send(new RegistrationConfirmationToUser(
                memberType: 'adult',
                names: $adultNames,
                count: 1,
                club: $club,
                amount: $totalAmount,
            ));
        } catch (\Exception $e) {
            Log::warning('Registration user email notification failed: ' . $e->getMessage());
        }

        return redirect()->route('register.success')->with([
            'success' => "Registration successful! {$label} registered. M-Pesa payment of KSH " . number_format($totalAmount) . " received.",
            'reg_notify' => [
                'type' => 'adult',
                'names' => $adultNames,
                'count' => 1,
                'phone' => $phone,
                'club' => $club,
                'amount' => $totalAmount,
            ],
        ]);
    }

    /**
     * Registration success page.
     */
    public function success()
    {
        return view('register-success');
    }

    /**
     * Trigger M-Pesa STK Push.
     */
    private function simulateMpesaStkPush(string $phone, float $amount): string
    {
        $mpesaService = new \App\Services\MpesaService();
        return $mpesaService->stkPush($phone, $amount, 'Mukusho_Reg');
    }
}
