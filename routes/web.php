<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [HomeController::class, 'login'])->name('login');
    Route::post('/authenticate', [HomeController::class, 'authenticate'])->name('authenticate');

    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

    Route::resource('user', UserController::class)->except(['create', 'store']);
});

