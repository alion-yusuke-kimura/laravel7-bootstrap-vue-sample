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

Route::prefix('guest')->namespace('Guest')->name('guest.')->group(function(){
    Auth::routes();
    Route::get('/', 'GuestController@index')->name('index');
});
// Route::middleware('auth:guest_api')->group(function () {
     Route::resource('guest', 'Guest\GuestController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']])->middleware(ActionLogMiddleware::class);
// });
// Route::middleware('auth:guest_api')->except('logout')->group(function () {
//     Route::resource('/guest', 'Guest\GuestController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']])->middleware(ActionLogMiddleware::class);
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/customer', 'CustomerController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']])->middleware(ActionLogMiddleware::class);
// Route::get('/customer{cudtomer?}', 'CustomerController@search')->name('customer.search');

// Route::prefix('customer')->group(function() {
//     Route::resource('', 'CustomerController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']])->middleware(ActionLogMiddleware::class);
//     Route::get('/search', 'CustomerController@search')->name('search');
// });

