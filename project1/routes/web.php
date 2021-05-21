<?php

use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\OrderController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Admins\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'locale'], function() {
    Route::prefix('/home')->group(function(){
        Route::get('/', 'App\Http\Controllers\Web\HomeController@home');
    });
    /*
     * Change language for website 
     * */
    Route::get('change-language/{language}', 'App\Http\Controllers\Web\HomeController@changeLanguage')
        ->name('user.change-language');
    /*
     *  Route for admin page
     *  */    
    Route::prefix('admin')->group(function () {
        /**
         * Manage all products:
         * include: show list products,
         * create new, edit and destroy
         */
        Route::resource('product', ProductController::class,[
            'names'=>[
                'index' => 'product.view'
            ]
        ]);
        /**
         * Manage all category:
         * include: show list categories,
         * create new, update and destroy
         */
        Route::resource('category',CategoryController::class,
            [
            'names'=>[
                'index' => 'category.view',
                'store' => 'category.add',
                'destroy'=>'category.delete'
                ]
            ]
        );
        /**
         * Manage all users:
         *  show list users,
         *  filter user blocked/non block,
         *  block/unblock a user
         */
        Route::resource('user', UserController::class,[
            'names'=>[
                'index' => 'user.view'
            ]
        ]);
        /**
         * Manage all order
         */
        Route::resource('order', OrderController::class,[
            'show' => 'order.detail',
            'update' => 'order.updateStatus',
            'destroy' => 'order.delete'
        ]);
    });
});


