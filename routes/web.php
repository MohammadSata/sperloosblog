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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [\App\Http\Controllers\HomeController::class, 'post'])->name('post');
Route::get('/login/{user}', [\App\Http\Controllers\Auth\AuthController::class, 'loginAsUser'])->name('loginAsUser');
Route::get('/login', [\App\Http\Controllers\Auth\AuthController::class, 'loginForm'])->name('login');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');
});
