<?php
namespace App;

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

Route::get('/login', '\App\Http\Controllers\UserController@showFormLogin')->name('login.show');
Route::post('/login', '\App\Http\Controllers\UserController@login')->name('login.login');
Route::get('/logout', '\App\Http\Controllers\UserController@logout')->name('login.logout');

Route::get('/register', '\App\Http\Controllers\UserController@showFormRegister');
Route::post('/register', '\App\Http\Controllers\UserController@register')->name('register');

Route::get('/user/{id}/profile', '\App\Http\Controllers\UserController@showProfile')->name('profile.show');
Route::post('/user/{id}/profile', '\App\Http\Controllers\UserController@updateProfile')->name('profile.update');

Route::get('/user/{id}/change-pass', '\App\Http\Controllers\UserController@showFormChangePass')->name('user.showPass');
Route::post('/user/{id}/change-pass', '\App\Http\Controllers\UserController@updatePass')->name('user.updatePass');

Route::post('/search', '\App\Http\Controllers\HouseController@search')->name('house.search');

// Route::get('/users', '\App\Http\Controllers\FrontendController@showIndex')->name('index')->middleware(\App\Http\Middleware\CheckUser::class);
Route::get('/', '\App\Http\Controllers\FrontendController@showIndex')->name('index');

Route::get('/add-house', '\App\Http\Controllers\HouseController@showFormAdd')->name('house.add')->middleware('auth');
Route::post('/add-house', '\App\Http\Controllers\HouseController@postHouse')->name('house.addForm')->middleware('auth');

Route::get('/house/{id}/detail', '\App\Http\Controllers\HouseController@detail')->name('house.detail');
Route::post('/house/{id}/detail/', '\App\Http\Controllers\HouseController@rentHome')->name('house.rent')->middleware('auth');

Route::get('/house/{id}/detail/confirm', '\App\Http\Controllers\BillController@confirmIndex')->name('house.confirm')->middleware('auth');
Route::post('/house/{id}/detail/confirm', '\App\Http\Controllers\BillController@confirmPost')->name('house.confirmPost')->middleware('auth');

Route::get('/success', '\App\Http\Controllers\BillController@success')->name('bill.success');
