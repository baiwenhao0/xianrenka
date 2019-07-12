<?php

use Illuminate\Http\Request;

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
// 第三方登录
//$api->post('socials/{social_type}/authorizations', 'AuthorizationsController@socialStore')
//    ->name('api.socials.authorizations.store');
// 登录
//$api->post('authorizations', 'AuthorizationsController@store')
//    ->name('api.authorizations.store');