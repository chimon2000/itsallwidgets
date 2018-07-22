<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        /*
        View::composer('master', function ($view) {
            $view->with('tracking_id', $tracking_id);
        });

        View::composer(
            '', 'App\Http\ViewComposers\ProfileComposer'
        );
        */
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}