<?php

namespace App\Providers;

use App\Domains\Logic\Models\User;
use App\Domains\Logic\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

/**
 * Class ObserverServiceProvider.
 */
class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
