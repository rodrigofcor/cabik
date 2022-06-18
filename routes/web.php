<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;

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
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::resource('pet', PetController::class);
});

Route::prefix('user')->group(function () {
    Route::get('/create', [UserController::class, 'create'])->name('user.create')->middleware('guest');
    Route::post('/store', [UserController::class, 'store'])->name('user.store')->middleware('guest');
    Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
    Route::put('/{user}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
});
