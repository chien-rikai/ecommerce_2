<?php

use App\Http\Controllers\Admins\CategoryController;
use App\Http\Controllers\Admins\LoginController as AdminsLoginController;
use App\Http\Controllers\Admins\OrderController;
use App\Http\Controllers\Admins\ProductController;
use App\Http\Controllers\Admins\SearchController as AdminsSearchController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\MemberController;
use App\Http\Controllers\Web\RegisterController;
use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Web\ProductController as WebProductController;
use App\Http\Controllers\Web\SearchController;
use App\Http\Controllers\Web\ProfileController;
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
        Route::resource('home', HomeController::class, [
            'except' => ['show']
        ]);
        Route::get('home/{category}/',[HomeController::class,'show'])->name('home.show');
        Route::get('home/fetch/{type}/',[HomeController::class,'fetch'])->name('home.fetch');
        /*
     *  Route for product page
     *  */  
    Route::resource('product', WebProductController::class,['as'=>'web']);
    Route::post('review/{id}', [WebProductController::class, 'review'])->name('review')->middleware('auth');
    Route::get('review/{star}', [WebProductController::class, 'reviewStar'])->name('review.star');
    Route::get('search',[SearchController::class, 'search'])->name('search');
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
         *  Route for profile page
         *  */
        Route::resource('profile', ProfileController::class);
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
    Route::group(['prefix' => 'admin', 'middleware' => ['auth.admin']], function () {
        /**
         * Manage all products:
         * include: show list products,
         * create new, edit and destroy
         */
        Route::post('product/productImport', [ProductController::class, 'productImport'])->name('product.import');
        Route::resource('product', ProductController::class, [
            'except' => ['show']
        ]);
        Route::get('product/filter/{status}', [ProductController::class, 'filter'])->name('product.filter');
        Route::put('product/restore/{id}',[ProductController::class, 'restore'])->name('product.restore');
        /**
         * Manage all category:
         * include: show list categories,
         * create new, update and destroy
         */
        Route::resource('category', CategoryController::class, [
            'except' => ['show']
        ]);
        Route::get('category/multi-level',[CategoryController::class, 'multiLevel'])->name('category.multi.level');
        Route::get('category/filter/{status}', [CategoryController::class, 'filter'])->name('category.filter');
        Route::put('category/restore/{id}',[CategoryController::class, 'restore'])->name('category.restore');
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
        ])->except(['show']);
        Route::get('user/{status}',[UserController::class,'show']);
        Route::put('user/restore/{id}',[UserController::class,'restore'])->name('user.restore');
        /**
         * Manage all order
         * show, update, destroy
         */
        Route::resource('order', OrderController::class);
        Route::put('order/restore/{id}',[OrderController::class,'restore'])->name('order.restore');
        /**
         * Filter order by status of order
         */
        Route::get('order/filter/{status}', [OrderController::class, 'filter'])->name('order.filter');
    });
    /**
     * Login admin
     */
    Route::resource('login', AdminsLoginController::class, [
        'as' => 'admin',
        'only' => 'index',
    ],);
    Route::post('login', [AdminsLoginController::class, 'postLogin'])->name('admin.login.post');
    Route::get('logout', [AdminsLoginController::class, 'logout'])->name('admin.logout');
});
