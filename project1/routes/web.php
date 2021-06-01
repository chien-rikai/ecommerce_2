<?php

use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\OrderController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\MemberController;
use App\Http\Controllers\Web\RegisterController;
use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Web\ProductController as WebProductController;
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

Route::group(['middleware' => 'locale'], function () {
    Route::prefix('web.com')->group(function () {
        Route::resource('login', LoginController::class, [
            'only' => ['index']
        ]);
        Route::post('login', [LoginController::class, 'postLogin'])->name('login.post');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::post('register', [RegisterController::class, 'store'])->name('register');

        Route::get('member/change-password', [MemberController::class, 'changePassword'])->name('change.password');
        Route::post('member/change-passowrd/{id}', [MemberController::class, 'postChangePassword'])->name('post.change.password');
        /*
        *  Route for home page
        *  */
        Route::resource('home', HomeController::class);
        /*
        *  Route for product page
        *  */  
        Route::resource('product', WebProductController::class,['as'=>'web']);
        Route::post('review/{id}', [WebProductController::class, 'review'])->name('review')->middleware('auth');
        Route::get('review/{star}', [WebProductController::class, 'reviewStar'])->name('review.star');
        /*
         *  Route for cart page
         *  */  
        Route::resource('cart', CartController::class);
        /*
        /*
         *  Route for payment page
         *  */
        Route::resource('payment', PaymentController::class);
        /*
        * Change language for website 
        * */
        Route::resource('member', MemberController::class, [
            'only' => ['index', 'update']
        ]);

        Route::get('change-language/{language}', 'App\Http\Controllers\Web\HomeController@changeLanguage')
            ->name('user.change-language');
    });

    /*
     *  Route for admin page
     *  */
    Route::prefix('admin')->group(function () {
        /**
         * Manage all products:
         * include: show list products,
         * create new, edit and destroy
         */
        Route::get('product/getProductData', [ProductController::class, 'getProductData'])->name('product.getdata');
        Route::post('product/productImport', [ProductController::class, 'productImport'])->name('product.import');
        Route::resource('product', ProductController::class, [
            'except' => ['show']
        ]);
        /**
         * Manage all category:
         * include: show list categories,
         * create new, update and destroy
         */
        Route::resource('category', CategoryController::class, [
            'names' => [
                'store' => 'category.add',
                'destroy' => 'category.delete'
            ]
        ]);
        /**
         * Manage all users:
         *  show list users,
         *  filter user blocked/non block,
         *  block/unblock a user
         */
        Route::resource('user', UserController::class, [
            'names' => [
                'index' => 'user.view'
            ]
        ]);
        /**
         * Manage all order
         * show, update, destroy
         */
        Route::resource('order', OrderController::class)->except('filter');
        /**
         * Filter order by status of order
         */
        Route::get('order/filter/{status}', [OrderController::class, 'filter'])->name('order.filter');
    });
});
