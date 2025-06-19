<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Plaid API Credentials
    |--------------------------------------------------------------------------
    |
    | Here you may configure your Plaid API credentials. The client ID and
    | secret are required for authenticating with the Plaid API. You can
    | obtain these credentials from your Plaid Dashboard.
    |
    */

    'client_id' => env('PLAID_CLIENT_ID'),

    /*
    |--------------------------------------------------------------------------
    | Plaid Environment
    |--------------------------------------------------------------------------
    |
    | This value determines which Plaid API environment to use.
    | Possible values: production, development, sandbox
    |
    */

    'environment' => env('PLAID_ENVIRONMENT', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Plaid Secrets
    |--------------------------------------------------------------------------
    |
    | Plaid requires different secrets for different environments.
    | You can specify them here or use environment variables.
    |
    */

    'secrets' => [
        'production' => env('PLAID_PRODUCTION_SECRET'),
        'development' => env('PLAID_DEVELOPMENT_SECRET'),
        'sandbox' => env('PLAID_SANDBOX_SECRET'),
    ],
];