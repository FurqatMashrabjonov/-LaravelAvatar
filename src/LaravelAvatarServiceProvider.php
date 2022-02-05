<?php

namespace Furqat\LaravelAvatar;

use Illuminate\Support\ServiceProvider;

class LaravelAvatarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/avatar.php' => config_path('avatar.php'),
        ]);
    }
}
