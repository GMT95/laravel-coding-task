<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function() {
    Route::post('/purchase-book', 'ReaderController@purchaseBook');
});

// Add book
Route::post('/books', 'BookController@store');

// Add reader
Route::post('/readers', 'Auth\RegisterController@register');

// Login Reader
Route::post('/login', 'Auth\LoginController@login');

// Logout Reader
Route::post('/logout', 'Auth\LoginController@logout');

// Get all readers with purchased books
Route::get('/readers', 'ReaderController@getAllReadersWithBooks');

