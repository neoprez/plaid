<?php

namespace Abivia\Plaid;

use Illuminate\Support\ServiceProvider;

class PlaidServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('plaid', function($app) {
            return new Plaid();
        });

        // Merge config
        $this->mergeConfigFrom(
            __DIR__.'/../config/plaid.php', 'plaid'
        );
    }

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/plaid.php' => config_path('plaid.php'),
        ], 'plaid-config');
    }
}
