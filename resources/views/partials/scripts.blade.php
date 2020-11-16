@if(file_exists(public_path($styleFile = 'vendor/artisan-gui/gui.js')))
    <script defer src="{{ asset($styleFile) }}"></script>
@else
    <script defer>
        <?php include $guiRoot . '/stubs/js/gui.js'; ?>
    </script>
@endif