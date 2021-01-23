<?php


namespace Infureal\Providers;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;


class GuiServiceProvider extends ServiceProvider {

    protected $root;

    public function __construct($app) {
        parent::__construct($app);
        $this->root = realpath(__DIR__ . '/../../');
    }

    protected function registerRoutes() {

        $middleware = config('artisan-gui.middlewares', []);

        \Route::middleware($middleware)
            ->prefix(config('artisan-gui.prefix', '~') . 'artisan')
            ->group(function () {

                $this->loadRoutesFrom("{$this->root}/routes/web.php");

            });
    }

    public function register() {
        $this->mergeConfigFrom(
            "{$this->root}/config/artisan-gui.php", 'artisan-gui'
        );

        $local = $this->app->environment('local');
        $only = config('artisan-gui.local', true);

        if ($local || !$only)
            $this->registerRoutes();

//        $this->loadComponents();
        $this->loadViewsFrom("{$this->root}/resources/views", 'gui');
    }

    public function boot() {
        $this->publishVendors();
        \View::share('guiRoot', $this->root);
    }

    protected function publishVendors() {
        $this->publishes([
            "{$this->root}/config/artisan-gui.php" => config_path('artisan-gui.php')
        ], 'artisan-gui-config');

        $this->publishes([
            "{$this->root}/stubs/css/gui.css" => public_path('vendor/artisan-gui/gui.css'),
            "{$this->root}/stubs/js/gui.js" => public_path('vendor/artisan-gui/gui.js'),
        ], 'artisan-gui-css-js');
    }

    protected function discoverComponents($dir = null) {

        $dir = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $dir);
        $dir = trim(trim($dir), DIRECTORY_SEPARATOR);

        $prefix = 'gui';

        if ($dir)
            $prefix .= '-' . \Str::of($dir)->replace(['\\', '/'], ' ')->slug();

        $namespace = '';

        if ($dir)
            $namespace = str_replace(DIRECTORY_SEPARATOR, '\\', $dir) . '\\';

        $path = "{$this->root}/src/View/Components/" . $dir;
        $fs = new Filesystem();

        $components = [];

        foreach ($fs->files($path) as $file) {
            $class = "Infureal\\View\\Components\\$namespace" . $file->getFilenameWithoutExtension();
            $components[$prefix][] = $class;
        }

        foreach ($fs->directories($path) as $directory) {
            $components += $this->discoverComponents($dir .= '/' . basename($directory));
        }

        return $components;

    }

    protected function loadComponents() {
        $components = $this->discoverComponents();

        foreach ($components as $key => $group) {
            foreach ($group as $component) {
                $name = strtolower(last(explode('\\', $component)));
                \Blade::component($component, $name, $key);
            }
        }

    }

}
