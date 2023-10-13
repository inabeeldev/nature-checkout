<?php

use Illuminate\Support\Facades\Route;

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


// Shop Routes
Route::get('/', [App\Http\Controllers\Shop\ShopController::class, 'home'])->name('nature-checkout-home');


//Guest User Auth Routes
Auth::routes();


// Authenticated User-specific routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});



// Authenticated Admin-specific routes
Route::group(['middleware' => ['auth:admin', 'admin']], function () {

});




// Authenticated Seller-specific routes
Route::group(['middleware' => ['auth:seller', 'seller']], function () {

});



