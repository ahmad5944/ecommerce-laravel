<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Front\FrontProductController;
use App\Http\Controllers\Front\FrontLoginController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\TestController;
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
Route::post('user-postLogin', [AuthController::class, 'userPostLogin'])->name('front.postLogin');
Route::get('/user-register', [FrontLoginController::class, 'index'])->name('front.register');

Route::get('/admin', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('permission', PermissionController::class);
    Route::resource('product', ProductController::class);
    Route::resource('user', UserController::class);
    Route::resource('cuti', CutiController::class);
    Route::resource('role', RoleController::class);
    
    Route::get('/pdf', [TestController::class, 'index']);
    Route::post('/convert-pdf-to-html', [TestController::class, 'convertToHtml']);
});