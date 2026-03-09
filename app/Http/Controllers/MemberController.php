<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use Illuminate\Http\Request;
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
        $totalAmount = count($cart) * 1000;

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
                'amount' => 1000.00,
                'payment_type' => 'registration',
                'mpesa_receipt' => $mpesaReceipt,
                'mpesa_phone' => $validated['mpesa_phone'],
                'month_for' => now()->format('F Y'),
                'status' => 'completed',
                'transaction_date' => now(),
            ]);
        }

        $childCount = count($cart);
        return redirect()->route('register.success')->with('success',
            "Registration successful! {$childCount} child(ren) registered. M-Pesa payment of KSH " . number_format($totalAmount) . " received."
        );
    }

    /**
     * Store adult registrations from the cart (one or more adults).
     */
    public function storeAdult(Request $request)
    {
        $validated = $request->validate([
            'cart_data' => 'required|string',
            'mpesa_phone' => 'required|string|max:20',
            'adult_images' => 'nullable|array',
            'adult_images.*' => 'nullable|image|max:3072',
        ]);

        $cart = json_decode($validated['cart_data'], true);

        if (empty($cart) || !is_array($cart)) {
            return back()->withErrors(['cart_data' => 'No adults were added to the cart.']);
        }

        // Validate each person in the cart
        foreach ($cart as $index => $person) {
            if (empty($person['full_name'])) {
                return back()->withErrors(['cart_data' => 'Person #' . ($index + 1) . ' is missing a full name.']);
            }
            if (empty($person['email'])) {
                return back()->withErrors(['cart_data' => 'Person #' . ($index + 1) . ' is missing an email address.']);
            }
            if (empty($person['phone'])) {
                return back()->withErrors(['cart_data' => 'Person #' . ($index + 1) . ' is missing a phone number.']);
            }
            if (empty($person['program'])) {
                return back()->withErrors(['cart_data' => 'Person #' . ($index + 1) . ' is missing a training program.']);
            }
            if (empty($person['club'])) {
                return back()->withErrors(['cart_data' => 'Person #' . ($index + 1) . ' is missing a club/dojo.']);
            }
            // Check email uniqueness
            if (Member::where('email', $person['email'])->exists()) {
                return back()->withErrors(['cart_data' => 'The email "' . $person['email'] . '" is already registered.']);
            }
        }

        // Handle optional adult images (matched by index)
        $adultImages = $request->file('adult_images', []);

        // Generate a shared group_id for this batch
        $groupId = time();
        $totalAmount = count($cart) * 1000;

        // Simulate M-Pesa STK push for total
        $mpesaReceipt = $this->simulateMpesaStkPush($validated['mpesa_phone'], $totalAmount);

        foreach ($cart as $index => $person) {
            // Handle optional image for this person
            $imagePath = null;
            if (isset($adultImages[$index]) && $adultImages[$index]->isValid()) {
                $imagePath = $adultImages[$index]->store('members', 'public');
            }

            $member = Member::create([
                'member_type' => 'adult',
                'full_name' => $person['full_name'],
                'email' => $person['email'],
                'image' => $imagePath,
                'phone' => $person['phone'],
                'gender' => $person['gender'] ?? null,
                'date_of_birth' => !empty($person['date_of_birth']) ? $person['date_of_birth'] : null,
                'location' => $person['location'] ?? null,
                'program' => $person['program'],
                'club' => $person['club'],
                'belt_rank' => 'White',
                'emergency_contact' => $person['emergency_contact'] ?? null,
                'emergency_phone' => $person['emergency_phone'] ?? null,
                'group_id' => $groupId,
                'membership_fee' => 1000.00,
                'membership_paid' => true,
                'status' => 'active',
            ]);

            Payment::create([
                'member_id' => $member->id,
                'amount' => 1000.00,
                'payment_type' => 'registration',
                'mpesa_receipt' => $mpesaReceipt,
                'mpesa_phone' => $validated['mpesa_phone'],
                'month_for' => now()->format('F Y'),
                'status' => 'completed',
                'transaction_date' => now(),
            ]);
        }

        $personCount = count($cart);
        $label = $personCount === 1 ? '1 adult' : "{$personCount} adults";
        return redirect()->route('register.success')->with('success',
            "Registration successful! {$label} registered. M-Pesa payment of KSH " . number_format($totalAmount) . " received."
        );
    }

    /**
     * Registration success page.
     */
    public function success()
    {
        return view('register-success');
    }

    /**
     * Simulate M-Pesa STK Push.
     * In production, this would call the Safaricom Daraja API.
     */
    private function simulateMpesaStkPush(string $phone, float $amount): string
    {
        return strtoupper(Str::random(10));
    }
}
