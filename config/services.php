<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'gtm' => [
        'id' => env('GTM_ID'),
    ],

    'ga4' => [
        'id' => env('GA4_ID'),
    ],

    'google_ads' => [
        'conversion_id' => env('GADS_CONVERSION_ID'),
    ],

    'whatsapp' => [
        'number' => preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', env('WHATSAPP_NUMBER', '081299994899'))),
        'display' => env('WHATSAPP_DISPLAY', '081299994899'),
        'message' => env('WHATSAPP_MESSAGE', "Halo Admin Hajj Club, saya tertarik dengan program kepemilikan travel haji & umrah bersama.\n\nMohon informasi lebih lanjut. Berikut data singkat saya:\n• Nama: \n• Kota/Domisili: \n• Profesi/Usaha saat ini: \n\nTerima kasih."),
    ],

    'social' => [
        'instagram' => env('INSTAGRAM_URL', 'https://instagram.com/hajjclub.id'),
        'instagram_handle' => env('INSTAGRAM_HANDLE', '@hajjclub.id'),
        'facebook' => env('FACEBOOK_URL', 'https://facebook.com/hajjclub.id'),
        'facebook_handle' => env('FACEBOOK_HANDLE', 'Hajj Club'),
    ],

];

