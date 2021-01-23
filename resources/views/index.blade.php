<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artisan ~ {{ $name = config('app.name', 'Laravel') }}</title>

    @include('gui::partials.styles')

</head>
<body class="bg-gray-100 font-mono">

    <div id="app">
        <app home="{{ url(config('artisan-gui.home', '/')) }}" endpoint="{{ route('gui.index') }}" />
    </div>

    @include('gui::partials.scripts')

</body>
</html>