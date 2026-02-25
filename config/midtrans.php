<?php
// config/midtrans.php

return [
    /*
    |--------------------------------------------------------------------------
    | Midtrans Server Key
    |--------------------------------------------------------------------------
    | Key untuk backend API calls. Diambil dari .env
    | Dashboard: https://dashboard.midtrans.com/settings/keys
    */
    'server_key' => env('MIDTRANS_SERVER_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Midtrans Client Key
    |--------------------------------------------------------------------------
    | Key untuk frontend Snap.js. Diambil dari .env
    */
    'client_key' => env('MIDTRANS_CLIENT_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Midtrans Environment
    |--------------------------------------------------------------------------
    | false = Sandbox (testing)
    | true = Production (live)
    */
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    /*
    |--------------------------------------------------------------------------
    | Sanitize Input
    |--------------------------------------------------------------------------
    | Menghapus karakter berbahaya dari input user sebelum dikirim ke Midtrans
    */
    'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),

    /*
    |--------------------------------------------------------------------------
    | 3D Secure
    |--------------------------------------------------------------------------
    | Mengaktifkan 3D Secure untuk transaksi kartu kredit
    */
    'is_3ds' => env('MIDTRANS_IS_3DS', true),
];