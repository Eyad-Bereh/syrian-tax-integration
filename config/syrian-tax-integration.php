<?php

return [
    'username' => env('SYRIAN_TAX_INTEGRATION_USERNAME'),
    'password' => env('SYRIAN_TAX_INTEGRATION_PASSWORD'),
    'tax_number' => env('SYRIAN_TAX_INTEGRATION_TAX_NUMBER'),
    'program' => env('SYRIAN_TAX_INTEGRATION_PROGRAM'),
    'queue' => [
        'enabled' => true,
        'connection' => env('QUEUE_CONNECTION'),
        'name' => 'taxes',
    ],
];
