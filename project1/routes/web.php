<?php

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
    Route::get('change-language/{language}', 'App\Http\Controllers\Web\HomeController@changeLanguage')
        ->name('user.change-language');









    Route::prefix('admin')->group(function () {
        Route::prefix('product')->group(function () {
            Route::get('/', function () {
                return view('admin/products_view');
            })->name('product.view');
            Route::get('/create', function () {
                return view('admin/product_created');
            })->name('product.create');
        });
        Route::prefix('category')->group(function () {
            Route::get('/', 'App\Http\Controllers\Admins\CategoryController@index')->name('category.view');
            Route::get('/new', function () {
                return view('admin/category_created');
            })->name('category.create');
            Route::post('/', 'App\Http\Controllers\Admins\CategoryController@addCategory')->name('category.add');
            Route::get('/:{id}/edit', 'App\Http\Controllers\Admins\CategoryController@editCategory')->name('category.edit');
            Route::patch('/:{id}', 'App\Http\Controllers\Admins\CategoryController@updateCategory')->name('category.update');
            Route::delete('/:{id}', 'App\Http\Controllers\Admins\CategoryController@deleteCategory')->name('category.delete');
        });
    });
});



