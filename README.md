<img src="https://raw.githubusercontent.com/inFureal/git-images/main/artisan-gui.png" style="max-width: 100%"  alt="Artisan GUI"/>

# <a href="https://laravel.com" target="_blank"><img src="https://laravel.com/img/logotype.min.svg" width="100"></a>:artisan gui
![Packagist License](https://img.shields.io/packagist/l/infureal/artisan-gui?style=flat)
![Packagist Version](https://img.shields.io/packagist/v/infureal/artisan-gui)
![Packagist Downloads](https://img.shields.io/packagist/dt/infureal/artisan-gui)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/infureal/artisan-gui)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/infureal/artisan-gui)


Simple but yet powerful library for running some [artisan](https://laravel.com/docs/8.x/artisan) commands.

## Requirements 
- **Laravel** 8.*
- **php** ^7.3

## Installation
Just install package:
```bash
composer require infureal/artisan-gui
```

By default package has predefined config and inline styles and scripts. 
Since version `1.4` you can publish vendors like css and js files in `vendor/artisan-gui`:
```bash
php artisan vendor:publish --provider="Infureal\Providers\GuiServiceProvider"
```
Publish only config: 
```bash
php artisan vendor:publish --tag="artisan-gui-config"
```

Publish only styles and scripts: 
```bash
php artisan vendor:publish --tag="artisan-gui-css-js"
```

## Running command
By default, you can access this page only in local environment. If you wish
you can change `local` key in config. 

Simply go to `http://you-domain.com/~artisan` and here we go! 
Select needed command from list, fill arguments and options/flags and hit `run` button.

## Configuration
Default config is:
```php 
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Middleware list for web routes
    |--------------------------------------------------------------------------
    |
    | You can pass any middleware for routes, by default it's just [web] group
    | of middleware.
    |
    */
    'middlewares' => [
        'web',
//        'auth'
    ],

    /*
    |--------------------------------------------------------------------------
    | Route prefix
    |--------------------------------------------------------------------------
    |
    | Prefix for gui routes. By default url is [/~artisan-gui].
    | For your wish you can set it for example 'my-'. So url will be [/my-artisan-gui].
    |
    | Why tilda? It's selected for prevent route names correlation.
    |
    */
    'prefix' => '~',

    /*
    |--------------------------------------------------------------------------
    | Home url
    |--------------------------------------------------------------------------
    |
    | Where to go when [home] button is pressed
    |
    */
    'home' => '/',

    /*
    |--------------------------------------------------------------------------
    | Only on local
    |--------------------------------------------------------------------------
    |
    | Flag that preventing showing commands if environment is on production
    |
    */
    'local' => true,

    /*
    |--------------------------------------------------------------------------
    | List of commands
    |--------------------------------------------------------------------------
    |
    | List of all default commands that has end of execution. Commands like
    | [serve] not supported in case of server side behavior of php.
    | Keys means group. You can shuffle commands as you wish and add your own.
    |
    */
    'commands' => [
        // ...
    ]

];

```

## Issues
If have any issue please [write me](https://github.com/inFureal/artisan-gui/issues).