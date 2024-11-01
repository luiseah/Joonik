<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue supports a variety of backends via a single, unified
    | API, giving you convenient access to each backend using identical
    | syntax for each. The default queue connection is defined below.
    |
    */
    'manager' => [
        'enabled_notification' => env('MANAGER_ENABLED_NOTIFICATION', true),
    ],

    'ingredients' => [
        'stock_default' => env('DEFAULT_STOCK_INGREDIENTS', 5),
    ],

    'recipes' => [
        'randomize_ingredient_quantities' => env('GENERATE_RANDOM_QUANTITIES_FOR_RECIPES', false),
    ],

    'farmers_market' => [
        'buy_endpoint' => env('FARMERS_MARKET_BUY_ENDPOINT', 'https://recruitment.alegra.com/api/farmers-market/buy'),

        'max_attempts' => env('MAX_PURCHASE_ATTEMPTS', 30),
    ],
];