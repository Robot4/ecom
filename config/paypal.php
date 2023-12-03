<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [

        'username'    => env('PAYPAL_SANDBOX_API_USERNAME', 'ARvDPgOdAKHESy89snChSMXzPST5yODiuc51IiFRFITLuL-xZRC33II4cHJwbHaXv-rdLody081US_8w'),
        'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', 'NjYw_4mm'),
        'secret'      => env('PAYPAL_SANDBOX_API_SECRET', 'EHeMNUoGQtfxBDftNdGiCk5wJvgtHRDnDVa0c-B5gR5AuIvcUJaECC_XS9dH2SKBn_labzyOs2pR6KBN'),
    ],
    'live' => [
        'username'    => env('PAYPAL_LIVE_API_USERNAME', ''),
        'password'    => env('PAYPAL_LIVE_API_PASSWORD', ''),
        'secret'      => env('PAYPAL_LIVE_API_SECRET', ''),
        'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE', ''),
        'app_id'      => '', // Used for Adaptive Payments API
    ],

    'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'billing_type'   => 'MerchantInitiatedBilling',
    'notify_url'     => '', // Change this accordingly for your application.
    'locale'         => '', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => true, // Validate SSL when creating api client.
];
