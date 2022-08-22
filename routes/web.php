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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/favourite', [App\Http\Controllers\HomeController::class, 'favourite'])->name('favourite');
Route::post('/favourite', [App\Http\Controllers\HomeController::class, 'addFavourite'])->name('add-favourite');
Route::delete('/favourite', [App\Http\Controllers\HomeController::class, 'removeFavourite'])->name('remove-favourite');
