<?php


namespace Infureal\Providers;


use Illuminate\Support\ServiceProvider;
use Infureal\Http\Controllers\GuiController;
use Infureal\View\Components\Group;
use Infureal\View\Components\Header;


class GuiServiceProvider extends ServiceProvider  {

    protected $root;
    const COMPONENTS = [
        \Infureal\View\Components\Command::class,
        Header::class,
        Group::class,
    ];

    public function __construct($app) {
        parent::__construct($app);
        $this->root = realpath(__DIR__ . '/../../');
    }

    protected function createRoutes() {
        $middleware = ['web'];

        if (config('gui.auth', false))
            $middleware += ['auth'];

        \Route::middleware($middleware)
            ->prefix('artisan')
            ->group(function () {

                \Route::get('/', [GuiController::class, 'index'])
                    ->name('gui.index');

                \Route::post('{command}', [GuiController::class, 'run'])
                    ->name('gui.run');

            });
    }

    function boot() {

        $local = $this->app->environment('local');
        $only = config('artisan-gui.only_local', true);

        // If it's local env or can register routes on production
        if ($local || !$only)
            $this->createRoutes();

        // Register component classes
        $this->loadViewComponentsAs('gui', static::COMPONENTS);
        // Register views
        $this->loadViewsFrom("{$this->root}/resources/views", 'gui');

        // Publish config file [config/artisan-gui.php]
        $this->publishes([
            "{$this->root}/config/artisan-gui.php" => config_path('artisan-gui.php')
        ], 'config');

        // Share $__trs variable to views. Just to prevent some repeating
        \View::share('__trs', 'transition ease-in-out duration-150');

    }

}