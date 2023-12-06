<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BoughtsController;
use App\Http\Controllers\UsersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    // Your authenticated routes go here

    Route::get('/details', [ProductsController::class, 'show'])->name('product-detail');

    Route::post('/buy-now', [BoughtsController::class, 'store'])->name('buy-now');

    Route::get('/purchases', [BoughtsController::class, 'index'])->name('purchase-list');

    Route::get('/user-profile', [UsersController::class, 'index'])->name('user-profile');

    Route::post('/info-change', [UsersController::class, 'update'])->name('info-change');
});


