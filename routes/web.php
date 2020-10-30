<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\ActionLogMiddleware;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/customer', 'CustomerController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']])->middleware(ActionLogMiddleware::class);
Route::get('/customer/{code?}', 'CustomerController@search')->name('customer.search');

// Route::prefix('customer')->group(function() {
//     Route::resource('', 'CustomerController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']])->middleware(ActionLogMiddleware::class);
//     Route::get('/search', 'CustomerController@search')->name('search');
// });

