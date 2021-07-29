<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Web\LoginController;
use App\Http\Controllers\Api\Web\RegisterController;
use App\Http\Controllers\Api\Web\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\Web\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('web.com')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::apiResource('/user', UserController::class, ['as' => 'api'])->only(['index','update']);
        Route::post('user/change-password/{id}', [UserController::class,'changePassword'])->name('api.change.password');
        Route::get('user/get-orders/{id}', [UserController::class,'getOrders'])->name('api.get.orders');
        Route::post('review/{id}', [ProductController::class, 'review'])->name('api.review');
    });
    Route::post('login', [LoginController::class, 'postLogin'])->name('api.login.post');
    Route::get('logout/{id}', [LoginController::class, 'logout'])->name('api.logout');
    Route::post('register', [RegisterController::class, 'store'])->name('api.register');
    Route::apiResource('products',ProductController::class);
    Route::post('payment',[PaymentController::class,'store']);
    Route::get('products/fetch/{type}/',[ProductController::class,'fetch']);
    Route::apiResource('categories',CategoryController::class);
});

