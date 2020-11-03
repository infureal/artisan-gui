<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artisan ~ {{ $name = config('app.name', 'Laravel') }}</title>

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Roboto Mono', monospace;
        }

        .trs {
            transition: ease-in-out 150ms;
        }
    </style>
</head>
<body class="bg-gray-200">

<div class="container mx-auto p-6" x-ref="main" x-data="{tab: 'laravel', command: null}">

    <!-- Topbar -->
    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl text-red-500">
            Artisan
        </h1>

        <a href="{{ url('/') }}"
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

            <pre>{{ trim(session('output')->fetch()) }}</pre>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        @if($custom = config('artisan-gui.commands', []))
            <x-gui-group id="App">
                @foreach($custom as $command)
                    <x-gui-command name="{{ $command }}"/>
                @endforeach
            </x-gui-group>
        @endif

        <x-gui-group id="laravel">
            <x-gui-command name="clear-compiled"/>
            <x-gui-command name="down"/>
            <x-gui-command name="env"/>
            <x-gui-command name="help"/>
            <x-gui-command name="inspire"/>
            <x-gui-command name="list"/>
            <x-gui-command name="optimize"/>
            <x-gui-command name="optimize:clear"/>
            <x-gui-command name="down"/>
            <x-gui-command name="notifications:table"/>
            <x-gui-command name="package:discover"/>
            <x-gui-command name="schedule:run"/>
            <x-gui-command name="schema:dump"/>
            <x-gui-command name="session:table"/>
            <x-gui-command name="storage:link"/>
            <x-gui-command name="stub:publish"/>
        </x-gui-group>

        <x-gui-group id="Auth">
            <x-gui-command name="auth:clear-resets"/>
        </x-gui-group>

        <x-gui-group id="Cache">
            <x-gui-command name="cache:clear"/>
            <x-gui-command name="cache:forget"/>
            <x-gui-command name="cache:table"/>
            <x-gui-command name="config:clear"/>
            <x-gui-command name="config:cache"/>
        </x-gui-group>

        <x-gui-group id="Database">
            <x-gui-command name="db:seed"/>
            <x-gui-command name="db:wipe"/>
        </x-gui-group>

        <x-gui-group id="Events">
            <x-gui-command name="event:cache"/>
            <x-gui-command name="event:clear"/>
            <x-gui-command name="event:generate"/>
            <x-gui-command name="event:list"/>
        </x-gui-group>

        <x-gui-group id="make">

            <x-gui-command name="make:cast"/>
            <x-gui-command name="make:channel"/>
            <x-gui-command name="make:command"/>
            <x-gui-command name="make:component"/>
            <x-gui-command name="make:controller"/>
            <x-gui-command name="make:event"/>
            <x-gui-command name="make:exception"/>
            <x-gui-command name="make:factory"/>
            <x-gui-command name="make:job"/>
            <x-gui-command name="make:listener"/>
            <x-gui-command name="make:mail"/>
            <x-gui-command name="make:middleware"/>
            <x-gui-command name="make:migration"/>
            <x-gui-command name="make:model"/>
            <x-gui-command name="make:notification"/>
            <x-gui-command name="make:observer"/>
            <x-gui-command name="make:policy"/>
            <x-gui-command name="make:provider"/>
            <x-gui-command name="make:request"/>
            <x-gui-command name="make:resource"/>
            <x-gui-command name="make:rule"/>
            <x-gui-command name="make:seeder"/>
            <x-gui-command name="make:test"/>

        </x-gui-group>

        <x-gui-group id="Migrate">

            <x-gui-command name="migrate"/>
            <x-gui-command name="migrate:fresh"/>
            <x-gui-command name="migrate:install"/>
            <x-gui-command name="migrate:refresh"/>
            <x-gui-command name="migrate:reset"/>
            <x-gui-command name="migrate:rollback"/>
            <x-gui-command name="migrate:status"/>

        </x-gui-group>

        <x-gui-group id="Queue">

            <x-gui-command name="queue:batches-table"/>
            <x-gui-command name="queue:clear"/>
            <x-gui-command name="queue:failed"/>
            <x-gui-command name="queue:failed-table"/>
            <x-gui-command name="queue:flush"/>
            <x-gui-command name="queue:forget"/>
            <x-gui-command name="queue:restart"/>
            <x-gui-command name="queue:retry"/>
            <x-gui-command name="queue:retry-batch"/>
            <x-gui-command name="queue:table"/>

        </x-gui-group>

        <x-gui-group id="Route">

            <x-gui-command name="route:cache"/>
            <x-gui-command name="route:clear"/>
            <x-gui-command name="route:list"/>

        </x-gui-group>

        <x-gui-group id="View">

            <x-gui-command name="view:cache"/>
            <x-gui-command name="view:clear"/>

        </x-gui-group>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</body>
</html>