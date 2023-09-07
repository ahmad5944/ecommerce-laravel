<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Front\Auth\FrontAuthController;
use App\Http\Controllers\Front\FrontProductController;
use App\Http\Controllers\Front\FrontOrderController;
use App\Http\Controllers\Front\FrontLoginController;
use App\Http\Controllers\Front\FrontUserController;
use App\Http\Controllers\Front\FrontCartController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
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

Route::get('/', [FrontProductController::class, 'index'])->name('front.product');
Route::get('/user-login', [FrontLoginController::class, 'index'])->name('front.login');
Route::post('user-postLogin', [FrontAuthController::class, 'userPostLogin'])->name('front.postLogin');
Route::get('/user-register', [FrontUserController::class, 'create'])->name('front.register');
Route::post('/user-register/store', [FrontUserController::class, 'store'])->name('front.store');

Route::get('/front-logout', [FrontAuthController::class, 'logout'])->name('front.logout');

Route::get('/admin', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('user.verify'); 

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');
    Route::resource('permission', PermissionController::class);
    Route::resource('product', ProductController::class);
    Route::resource('user', UserController::class);
    Route::resource('cuti', CutiController::class);
    Route::resource('role', RoleController::class);
    Route::resource('order', OrderController::class);
    Route::get('/order/{inv}', [OrderController::class, 'show'])->name('order.show');

    
    // Frontend
    Route::get('/produk', [FrontProductController::class, 'index'])->name('front.index');

    // user profile
    Route::get('/front-user/{id}', [FrontUserController::class, 'edit'])->name('front.user.edit');
    Route::patch('/front-user/update/{id}', [FrontUserController::class, 'update'])->name('front.user.update');
    Route::post('/front-user/store', [FrontUserController::class, 'store'])->name('front.user.store');

    // cart
    Route::get('/front-cart/{id}', [FrontCartController::class, 'edit'])->name('front.cart');
    Route::post('/front-add-to-cart/{id}', [FrontCartController::class, 'addToCart'])->name('front.add-to-cart');
    Route::get('/front-remove-cart/{id}', [FrontCartController::class, 'removeCart'])->name('front.remove-cart');
    
    // order
    Route::get('/front-order', [FrontOrderController::class, 'index'])->name('front.order');
    Route::get('/front-add-order', [FrontOrderController::class, 'order'])->name('front.order.store');
    Route::get('/front-cancel-order/{id}', [FrontOrderController::class, 'cancelOrder'])->name('front.cancel-order');
    Route::get('/front-report-excel/{id}', [FrontOrderController::class, 'excel'])->name('front.report-excel');
});
