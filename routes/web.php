<?php

use App\Http\Controllers\ShortenedLinkController;
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

Route::get('/', function () {
    return redirect(route('link.create'));
});

Route::controller(ShortenedLinkController::class)->group(function () {
    Route::get('/link/create', 'create')->name('link.create');
    Route::post('/link/store', 'store')->name('link.store');
    Route::get('/s/{shortLinkId}', 'redirectToFullLink')->name('link.redirect');
});
