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
Route::redirect('/','/en');

Route::group(['prefix' => '{language}'], function () {

    Route::get('/', function () {
        return view('welcome');
    });


    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/check-currency', [App\Http\Controllers\HTTPController::class, 'checkCurrency'])->name('check-currency');
    Route::post('/show-check-currency', [App\Http\Controllers\HTTPController::class, 'checkCurrencyQuerry'])->name('show-check-currency');

    Route::get('/add-currency', [App\Http\Controllers\HTTPController::class, 'chooseCurrency'])->name('add-currency');
    Route::post('/add-currency', [App\Http\Controllers\HTTPController::class, 'addCurrency'])->name('add-currency');


    Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

    Route::get('/delete-account', [App\Http\Controllers\HomeController::class, 'deleteAccount'])->name('delete-account');
    Route::delete('/delete-account', [App\Http\Controllers\HomeController::class, 'destroyAccount'])->name('destroy-account');
});


