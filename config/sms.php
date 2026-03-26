<?php

return [
    'driver' => env('SMS_DRIVER', 'africastalking'),

    'africastalking' => [
        'api_key' => env('AFRICASTALKING_API_KEY'),
        'username' => env('AFRICASTALKING_USERNAME', 'sandbox'),
        'from' => env('AFRICASTALKING_FROM', null), // Sender ID (null = shared shortcode)
    ],
];
