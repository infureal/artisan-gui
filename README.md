[![Latest Version](https://img.shields.io/packagist/v/intervention/image.svg)](https://packagist.org/packages/tachii/artisan-gui)

> Updated original artisan-gui package to work with Laravel 10 & PHP8.3
>
> Old version is still available at [infureal/artisan-gui](https://github.com/infureal/artisan-gui)

<img src="https://raw.githubusercontent.com/inFureal/git-images/main/artisan-gui.png" style="max-width: 100%"  alt="Artisan GUI"/>

# <a href="https://laravel.com" target="_blank"><img src="https://laravel.com/img/logotype.min.svg" width="100"></a>:artisan gui

Simple but yet powerful library for running some [artisan](https://laravel.com/docs/8.x/artisan) commands.

## Requirements

- **Laravel** 10.*
- **php** ^8

## Installation

Just install package:

```bash
composer require Tachii/artisan-gui
```

### Vendor publishing

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

## What's new in v2

- Moved to SPA/Vue
- UI changed to more readable (IMHO)
    - <img width="500px" src="https://raw.githubusercontent.com/inFureal/git-images/main/artisan-gui-2.0.0.png" />
- Implementing search (with new design it's hard to find some command without search)
- Added permission field to config (for more flexible adjustment)
- Added array option fields

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
    | List of command permissions
    |--------------------------------------------------------------------------
    |
    | Specify permissions to every single command. Can be a string or array
    | of permissions
    |
    | Example:
    |   'make:controller' => 'create-controller',
    |   'make:event' => ['generate-files', 'create-event'],
    |
    */
    'permissions' => [
    ],
    
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
