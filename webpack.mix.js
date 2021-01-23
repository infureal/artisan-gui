const mix = require('laravel-mix');
let tailwind = require('tailwindcss');

mix.disableNotifications();
mix.options({
    autoprefixer: {remove: false}
});

mix.js('resources/js/gui.js', 'stubs/js')
    .vue();

mix.postCss('resources/css/gui.css', 'stubs/css', [
    tailwind('./tailwind.config.js')
])