<img src="https://raw.githubusercontent.com/inFureal/git-images/main/artisan-gui.png" style="max-width: 100%" />

# <a href="https://laravel.com" target="_blank"><img src="https://laravel.com/img/logotype.min.svg" width="100"></a>:artisan gui
![Packagist License](https://img.shields.io/packagist/l/infureal/artisan-gui?style=flat)
![Packagist Version](https://img.shields.io/packagist/v/infureal/artisan-gui)
![Packagist Downloads](https://img.shields.io/packagist/dt/infureal/artisan-gui)
![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/infureal/artisan-gui)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/infureal/artisan-gui)


Simple but yet powerful library for running some [artisan](https://laravel.com/docs/8.x/artisan) commands

## Requirements 
- **Laravel** 8.*
- **php** ^7.3
- **internet connection**. For what? For accessing cdns to tailwindcss and alpinejs

## Installation
Just install package:
```bash
composer require infureal/artisan-gui
```

For some "flexibility" you can publish config file `config/artisan-gui.php`:
```bash
php artisan vendor:publish --provider="Infureal\Providers\GuiServiceProvider"
```

## Running command
Simply go to `http://you-domain.com/artisan` and here we go! 
Select needed command from list, fill arguments and options/flags and hit `run` button.

## Issues
If have any issue please [write me](https://github.com/inFureal/artisan-gui/issues).