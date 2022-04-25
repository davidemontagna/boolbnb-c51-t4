<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::middleware('auth')
    ->namespace('User')
    ->name('user.')
    ->prefix('user')
    ->group(function(){
        Route::get('/', 'HomeController@index')
        ->name('home');
        Route::resource('/apartments', ApartmentController::class);
        Route::resource('/messages', MessageController::class);
        Route::get('/apartments/{apartment:id}/sponsorship/plans', 'PaymentController@plans')->name('plans');
        Route::get('/apartments/{apartment:id}/sponsorship/{plan:id}/payment', 'PaymentController@index')->name('payment');
        Route::post('/apartments/{apartment:id}/sponsorship/{plan:id}/checkout', 'PaymentController@checkout')->name('checkout');
});

Route::get("{any?}", function() {
    return view('guest.home');
})->where("any", ".*");