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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'Web\UsersController@home')->name('home');
Route::get('/help', 'Web\UsersController@help')->name('help');

Route::get('/about', 'Web\UsersController@about')->name('about');
Route::get('/login', 'Web\UsersController@login')->name('login');
Route::get('userCreate', 'Web\UsersController@userCreate')->name('userCreate');
Route::get('user/reg', 'Web\UsersController@userReg')->name('userReg');
Route::resource('users', 'Web\UsersController');    //资源路由器
//Route::get('/users/{user}', 'Web\UsersController@show')->name('web.users.show');
