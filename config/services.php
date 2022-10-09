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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'github' => [
        'client_id' => '24fbd0edd46019058da7', //Github API
        'client_secret' => '4500e6ab7a9bb70608600fbdee37969276bb0685', //Github Secret
        'redirect' => 'http://localhost:8000/login/github/callback',
     ],
     'google' => [
        'client_id' => '513014842336-ivm8ftiq83mloepgckcff6f15tno9isb.apps.googleusercontent.com', //Google API
        'client_secret' => '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', //Google Secret
        'redirect' => 'https://elegancelinsen.ch/login/google/callback',
     ],
     'facebook' => [
        'client_id' => '1268238167312564', //Facebook API
        'client_secret' => 'b948084cd91347c7e5a831fecc6bc1ef', //Facebook Secret
        'redirect' => 'https://elegancelinsen.ch/login/facebook/callback',
     ],

];
