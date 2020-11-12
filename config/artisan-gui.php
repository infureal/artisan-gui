<?php

return [

    // Add middlewares to the route
    'middlewares' => [
        'web',
//        'auth'
    ],

    // route prefix -> ~artisan
    'prefix' => '~',

    // Register routes only when local environment
    'only_local' => true,

    // List of custom commands to show it in list of all commands
    // If not empty shows [App] block in page
    'commands' => [
        // Example: 'ide-helper:models'
    ]

];
