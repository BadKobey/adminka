<?php

use App\Http\Controllers\Main\CheckoutController;
use App\Http\Controllers\Main\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|q
*/

Route::group(['namespace' => 'Main'], function (){
    Route::get('/','IndexController')->name('maim.index');
    Route::get('/search','IndexController@search')->name('search');
    Route::get('/addCart','IndexController@addCart')->name('addCart');
});
Route::post('/order',OrderController::class)->name('order');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth', 'verified'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/checkout',CheckoutController::class)->name('main.checkout');
});

require __DIR__.'/auth.php';
