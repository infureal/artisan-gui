<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

@if(file_exists(public_path($styleFile = 'vendor/artisan-gui/gui.css')))
    <link rel="stylesheet" href="{{ asset($styleFile) }}">
@else
    <style>
        <?php include $guiRoot . '/stubs/css/gui.css'; ?>
    </style>
@endif