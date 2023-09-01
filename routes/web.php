<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdcutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RoleController;


use App\Http\Controllers\Auth\AuthController;

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

Route::get('/', [DashboardController::class, 'index']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('permission', PermissionController::class);
    Route::resource('product', ProdcutController::class);
    Route::resource('user', UserController::class);
    Route::resource('cuti', CutiController::class);
    Route::resource('role', RoleController::class);
    
    Route::get('/pdf', [TestController::class, 'index']);
    Route::post('/convert-pdf-to-html', [TestController::class, 'convertToHtml']);
});
