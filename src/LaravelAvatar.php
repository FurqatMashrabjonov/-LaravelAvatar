<?php

namespace Furqat\LaravelAvatar;

use Illuminate\Support\Facades\Facade;

class LaravelAvatar extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-avatar';
    }
}
