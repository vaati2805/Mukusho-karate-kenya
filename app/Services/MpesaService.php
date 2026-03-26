<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaService
{
    /**
     * Get the base URL based on the environment
     */
    private function getBaseUrl(): string
    {
        return config('mpesa.env') === 'live' 
            ? 'https://api.safaricom.co.ke'
            : 'https://sandbox.safaricom.co.ke';
    }

    /**
     * Generate an OAuth authentication token
     */
    public function generateToken(): ?string
    {
        $consumerKey = config('mpesa.consumer_key');
        $consumerSecret = config('mpesa.consumer_secret');
        
        if (empty($consumerKey) || empty($consumerSecret) || $consumerKey === 'your_consumer_key_here') {
            Log::warning('M-Pesa Consumer Key/Secret not set. Bypassing token generation.');
            return null;
        }

        $credentials = base64_encode($consumerKey . ':' . $consumerSecret);
        $url = $this->getBaseUrl() . '/oauth/v1/generate?grant_type=client_credentials';

        try {
            $response = Http::withHeaders([
                'Authorization' => "Basic {$credentials}"
            ])->retry(3, 100)->get($url);

            if ($response->successful()) {
                return $response->json('access_token');
            }
            
            Log::error('M-Pesa Token Generation Failed: ' . $response->body());
        } catch (\Exception $e) {
            Log::error('M-Pesa Token Exception: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Initiate STK Push (Lipa Na M-Pesa Online)
     */
    public function stkPush(string $phone, float $amount, string $reference = 'Registration'): ?string
    {
        $token = $this->generateToken();
        if (!$token) {
            Log::warning('Skipping STK push because token could not be generated.');
            return 'DUMMY_' . strtoupper(substr(uniqid(), -6));
        }

        // Format phone number (e.g., 0712... -> 254712...)
        $phone = preg_replace('/^0/', '254', preg_replace('/[^0-9]/', '', $phone));
        if (strlen($phone) !== 12) {
            Log::warning('Invalid M-Pesa phone number format: ' . $phone);
            return 'INVALID_PHONE';
        }

        $shortcode = config('mpesa.shortcode');
        $passkey = config('mpesa.passkey');
        
        $timestamp = date('YmdHis');
        $password = base64_encode($shortcode . $passkey . $timestamp);

        $url = $this->getBaseUrl() . '/mpesa/stkpush/v1/processrequest';

        try {
            $response = Http::withToken($token)
                ->retry(2, 500)
                ->post($url, [
                    'BusinessShortCode' => $shortcode,
                    'Password' => $password,
                    'Timestamp' => $timestamp,
                    'TransactionType' => 'CustomerPayBillOnline',
                    'Amount' => round($amount),
                    'PartyA' => $phone,
                    'PartyB' => $shortcode,
                    'PhoneNumber' => $phone,
                    'CallBackURL' => config('mpesa.callback_url'),
                    'AccountReference' => substr($reference, 0, 12),
                    'TransactionDesc' => 'Mukusho Karate Payment'
                ]);

            if ($response->successful()) {
                return $response->json('CheckoutRequestID'); // Return the Daraja tracking ID
            }
            
            Log::error('M-Pesa STK Push Failed: ' . $response->body());
            
            // For now, if Daraja errors out (e.g. invalid keys), we fall back to a random string so it doesn't break the user's registration
            return 'ERR_' . strtoupper(substr(uniqid(), -6));
            
        } catch (\Exception $e) {
            Log::error('M-Pesa STK Push Exception: ' . $e->getMessage());
            return 'EX_' . strtoupper(substr(uniqid(), -6));
        }
    }
}
