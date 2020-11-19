<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artisan ~ {{ $name = config('app.name', 'Laravel') }}</title>

    @include('gui::partials.styles')
    @include('gui::partials.scripts')

</head>
<body class="bg-gray-200 font-mono">

<div class="container mx-auto p-6"
     x-ref="main"
     x-data="{
                tab: window.localStorage.getItem('gui-tab') ?? '{{ array_key_first($commands) }}',
                command: window.localStorage.getItem('gui-command')
            }"
>

    <!-- Topbar -->
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl text-red-500">
            Artisan
        </h1>

        <a href="{{ url(config('artisan-gui.home', '/')) }}"
           class="{{ $__trs }} text-gray-500 hover:text-gray-800 px-4 py-2 rounded hover:bg-gray-300">
            ./home
        </a>

    </div>
    <!-- /Topbar -->

    @if(session()->has('output'))
        <div class="mb-6 text-gray-100 bg-gray-800 rounded-md p-6 overflow-x-auto">
            <div class="text-gray-500 mb-6">
                [{{ session('command') }}] command output
            </div>

            <pre>{{ trim(session('output')) }}</pre>
        </div>
    @endif

    @if($errors->any())
        <div class="p-6 bg-red-500 text-red-100 rounded-md overflow-x-auto mb-6">
            <div class="grid grid-cols-1 gap-4">
                @foreach($errors->all() as $error)
                    <div>
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        @foreach($commands as $name => $group)
                <x-gui-group id="{{ $name }}">
                    @foreach($group as $command)
                        <x-gui-command name="{{ $command }}"/>
                    @endforeach
                </x-gui-group>
        @endforeach

    </div>

</div>

</body>
</html>