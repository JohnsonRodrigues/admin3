<?php

namespace I9code\LaravelMetronic3;

use I9code\LaravelMetronic3\Console\MakeMetronic3Command;
use I9code\LaravelMetronic3\Console\Metronic3MakeCommand;
use I9code\LaravelMetronic3\Events\BuildingMenu;
use I9code\LaravelMetronic3\Http\ViewComposers\Metronic3Composer;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->singleton(Metronic3::class, function (Container $app) {
            return new Metronic3(
                $app['config']['metronic3.filters'],
                $app['events'],
                $app
            );
        });
    }

    public function boot(
        Factory $view,
        Dispatcher $events,
        Repository $config
    )
    {
        $this->loadViews();

        $this->loadTranslations();

        $this->publishConfig();

        $this->publishAssets();

        $this->registerCommands();

        $this->registerViewComposers($view);

        static::registerMenu($events, $config);
    }

    private function loadViews()
    {
        $viewsPath = $this->packagePath('resources/views');

        $this->loadViewsFrom($viewsPath, 'metronic3');

        $this->publishes([
            $viewsPath => base_path('resources/views/vendor/metronic3'),
        ], 'views');
    }

    private function loadTranslations()
    {
        $translationsPath = $this->packagePath('resources/lang');

        $this->loadTranslationsFrom($translationsPath, 'metronic3');

        $this->publishes([
            $translationsPath => base_path('resources/lang/vendor/metronic3'),
        ], 'translations');
    }

    private function publishConfig()
    {
        $configPath = $this->packagePath('config/metronic3.php');

        $this->publishes([
            $configPath => config_path('metronic3.php'),
        ], 'config');

        $this->mergeConfigFrom($configPath, 'metronic3');
    }

    private function publishAssets()
    {
        $this->publishes([
            $this->packagePath('resources/assets') => public_path('vendor/metronic3'),
        ], 'assets');
    }

    private function packagePath($path)
    {
        return __DIR__ . "/../$path";
    }

    private function registerCommands()
    {
        // Laravel >=5.2 only
        if (class_exists('Illuminate\\Auth\\Console\\MakeAuthCommand')) {
            $this->commands(MakeMetronic3Command::class);
        } elseif (class_exists('Illuminate\\Auth\\Console\\AuthMakeCommand')) {
            $this->commands(Metronic3MakeCommand::class);
        }
    }

    private function registerViewComposers(Factory $view)
    {
        $view->composer('metronic3::page', Metronic3Composer::class);
    }

    public static function registerMenu(Dispatcher $events, Repository $config)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) use ($config) {
            $menu = $config->get('metronic3.menu');
            call_user_func_array([$event->menu, 'add'], $menu);
        });
    }
}
