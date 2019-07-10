<?php

namespace Fuying\Xunfei;

use Illuminate\Support\ServiceProvider;
use Fuying\Xunfei\Xunfei;

class XunfeiProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('xunfei', function ($app) {
            return new Xunfei();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/xunfei.php' => config_path('xunfei.php'),
        ]);
    }
}
