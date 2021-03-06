<?php

namespace App\Providers;

use App\Http\ViewComposers\CartComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
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
        View::composer(
            'web.*', CartComposer::class
        );
    }
}
