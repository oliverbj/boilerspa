<?php

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

Route::redirect('/', '/home/dashboard');

Auth::routes();

Route::get('/login/magic', 'Auth\MagicLoginController@show');
Route::post('/login/magic', 'Auth\MagicLoginController@sendToken');
Route::get('/login/magic/{token}', 'Auth\MagicLoginController@validateToken');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
});

Route::get('{view}', 'HomeController@index')->where('view', '(.*)');
