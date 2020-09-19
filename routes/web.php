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

Route::get('/login', '\App\Http\Controllers\LoginController@showFormLogin')->name('login');
Route::get('/register', '\App\Http\Controllers\LoginController@showFormRegister');
Route::post('/register', '\App\Http\Controllers\LoginController@register')->name('register');


// Route::get('/', '');
Route::get('/users', '\App\Http\Controllers\FrontendController@showIndex')->middleware(\App\Http\Middleware\CheckUser::class);
