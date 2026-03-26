<?php

return [
    'env' => env('MPESA_ENV', 'sandbox'), // sandbox or live
    
    'consumer_key' => env('MPESA_CONSUMER_KEY'),
    'consumer_secret' => env('MPESA_CONSUMER_SECRET'),
    
    'shortcode' => env('MPESA_SHORTCODE', '174379'), 
    'passkey' => env('MPESA_PASSKEY', 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919'),
    
    'callback_url' => env('MPESA_CALLBACK_URL', 'https://your-ngrok-or-domain.com/api/mpesa/callback'),
];
