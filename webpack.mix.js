const mix = require('laravel-mix');
let tailwind = require('tailwindcss')

mix.js('resources/js/gui.js', 'stubs/js')
    .postCss('resources/css/gui.css', 'stubs/css', [
        tailwind('./tailwind.config.js')
    ])