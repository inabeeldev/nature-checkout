<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\ShopController;

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

Route::get('/', [Shop\ShopController::class, 'home'])->name('nature-checkout-home');

Auth::routes();


// Simple user-specific routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


Route::group(['middleware' => ['auth:seller', 'seller']], function () {
    // Seller-specific routes
});

Route::group(['middleware' => ['auth:admin', 'admin']], function () {
    // Admin-specific routes
});
