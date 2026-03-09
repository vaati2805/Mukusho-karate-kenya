<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Show the monthly payment form.
     */
    public function create()
    {
        return view('pay-monthly');
    }

    /**
     * Process a monthly fee payment.
     */
    public function store(Request $request)
    {
        $paymentFor = $request->input('payment_for', 'adult');

        if ($paymentFor === 'child') {
            // Child payment: lookup by guardian email + child name
            $validated = $request->validate([
                'email'       => 'required|email',
                'child_name'  => 'required|string|max:255',
                'mpesa_phone' => 'required|string|max:20',
                'amount'      => 'required|numeric|min:100',
                'month_for'   => 'required|string|max:50',
            ]);

            // Find the child member by guardian email and child name
            $member = Member::where('email', $validated['email'])
                ->where('full_name', $validated['child_name'])
                ->where('member_type', 'kid')
                ->first();

            if (!$member) {
                return back()->withErrors([
                    'child_name' => 'No child member found with that name and guardian email. Please check the details and try again.',
                ])->withInput();
            }
        } else {
            // Adult payment: lookup by email
            $validated = $request->validate([
                'email'       => 'required|email|exists:members,email',
                'mpesa_phone' => 'required|string|max:20',
                'amount'      => 'required|numeric|min:100',
                'month_for'   => 'required|string|max:50',
            ]);

            $member = Member::where('email', $validated['email'])->firstOrFail();
        }

        // Simulate M-Pesa STK push
        $mpesaReceipt = $this->simulateMpesaStkPush($validated['mpesa_phone'], $validated['amount']);

        Payment::create([
            'member_id' => $member->id,
            'amount' => $validated['amount'],
            'payment_type' => 'monthly',
            'mpesa_receipt' => $mpesaReceipt,
            'mpesa_phone' => $validated['mpesa_phone'],
            'month_for' => $validated['month_for'],
            'status' => 'completed',
            'transaction_date' => now(),
        ]);

        return redirect()->route('payment.success')->with('success', 'Monthly payment of KSH ' . number_format($validated['amount']) . ' received successfully! Receipt: ' . $mpesaReceipt);
    }

    /**
     * Payment success page.
     */
    public function success()
    {
        return view('payment-success');
    }

    /**
     * Simulate M-Pesa STK Push.
     */
    private function simulateMpesaStkPush(string $phone, float $amount): string
    {
        return strtoupper(Str::random(10));
    }
}
