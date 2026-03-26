<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    /**
     * Send an SMS using Africa's Talking API.
     */
    public function send(string $phone, string $message): bool
    {
        $phone = $this->formatPhone($phone);
        $apiKey = config('sms.africastalking.api_key');
        $username = config('sms.africastalking.username');

        if (empty($apiKey) || $apiKey === 'your_api_key_here') {
            Log::warning("SMS not sent (API key not configured). To: {$phone} | Message: {$message}");
            return false;
        }

        $payload = [
            'username' => $username,
            'to' => $phone,
            'message' => $message,
        ];

        $from = config('sms.africastalking.from');
        if ($from) {
            $payload['from'] = $from;
        }

        $url = $username === 'sandbox'
            ? 'https://api.sandbox.africastalking.com/version1/messaging'
            : 'https://api.africastalking.com/version1/messaging';

        try {
            $response = Http::withHeaders([
                'apiKey' => $apiKey,
                'Accept' => 'application/json',
            ])->asForm()->post($url, $payload);

            if ($response->successful()) {
                Log::info("SMS sent to {$phone}: {$message}");
                return true;
            }

            Log::error("SMS failed to {$phone}: " . $response->body());
        } catch (\Exception $e) {
            Log::error("SMS exception for {$phone}: " . $e->getMessage());
        }

        return false;
    }

    /**
     * Format phone number to +254 international format.
     */
    private function formatPhone(string $phone): string
    {
        $phone = preg_replace('/[^0-9+]/', '', $phone);

        if (str_starts_with($phone, '0')) {
            $phone = '+254' . substr($phone, 1);
        } elseif (str_starts_with($phone, '254')) {
            $phone = '+' . $phone;
        } elseif (!str_starts_with($phone, '+')) {
            $phone = '+254' . $phone;
        }

        return $phone;
    }

    /**
     * Send free trial confirmation SMS.
     */
    public function sendTrialConfirmation(string $phone, string $name, ?string $program): bool
    {
        $programText = $program ? " ({$program})" : '';
        $message = "Hi {$name}, your free trial request{$programText} has been received! We'll contact you shortly to schedule your session. Welcome to Mukusho Karate Kenya!";

        return $this->send($phone, $message);
    }

    /**
     * Send registration confirmation SMS.
     */
    public function sendRegistrationConfirmation(string $phone, string $names, string $memberType, float $amount, string $club): bool
    {
        $typeLabel = $memberType === 'kid' ? 'child' : 'adult';
        $message = "Mukusho Karate: Registration confirmed for {$names} ({$typeLabel}). KSH " . number_format($amount) . " received. Club: {$club}. Welcome to the dojo! 🥋";

        return $this->send($phone, $message);
    }

    /**
     * Send monthly payment confirmation SMS.
     */
    public function sendPaymentConfirmation(string $phone, string $memberName, float $amount, string $monthFor, string $receipt): bool
    {
        $message = "Mukusho Karate: Monthly payment of KSH " . number_format($amount) . " for {$memberName} ({$monthFor}) received. Receipt: {$receipt}. Thank you!";

        return $this->send($phone, $message);
    }
}
