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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', '\App\Http\Controllers\LoginController@showFormLogin')->name('login.show');
Route::post('/login', '\App\Http\Controllers\LoginController@login')->name('login.login');
Route::get('/logout', '\App\Http\Controllers\LoginController@logout')->name('login.logout');

Route::get('/register', '\App\Http\Controllers\LoginController@showFormRegister');
Route::post('/register', '\App\Http\Controllers\LoginController@register')->name('register');

// Route::get('/users', '\App\Http\Controllers\FrontendController@showIndex')->name('index')->middleware(\App\Http\Middleware\CheckUser::class);
Route::get('/', '\App\Http\Controllers\FrontendController@showIndex')->name('index')->middleware(\App\Http\Middleware\CheckUser::class);
