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
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'Web\UsersController@signup')->name('signup');
Route::resource('users', 'Web\UsersController');    //资源路由器

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('signup/confirm/{token}', 'Web\UsersController@confirmEmail')->name('confirm_email');


//密码重置
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//微博资源路由
Route::resource('statuses', 'Web\StatusesController', ['only' => ['store', 'destroy']]);

//关注着和粉丝列表
Route::get('/users/{user}/followings', 'Web\UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'Web\UsersController@followers')->name('users.followers');

//关注用户和取消用户功能
Route::post('/users/followers/{user}', 'Web\FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'Web\FollowersController@destroy')->name('followers.destroy');





