<?php

namespace App\Providers;

use App\Http\ViewComposers\CategoryComposer;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['web.*',
            'admin.product_created',
            'admin.product_edit',
            'admin.products_view',
            'admin.category_view',
            'admin.category_created',
            'admin.category_edit'], 
                CategoryComposer::class,
        );
        Paginator::useBootstrap();
    }
}
