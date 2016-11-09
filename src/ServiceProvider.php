<?php

namespace VueGenerators;

use VueGenerators\Commands\MakeMixin;
use VueGenerators\Commands\MakeComponent;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register Artisan commands.
     */
    protected function registerCommands()
    {
        $this->app->singleton('command.vueg.component', function ($app) {
            return $app[MakeComponent::class];
        });

        $this->app->singleton('command.vueg.mixin', function ($app) {
            return $app[MakeMixin::class];
        });

        $this->commands('command.vueg.component');

        $this->commands('command.vueg.mixin');
    }
}
