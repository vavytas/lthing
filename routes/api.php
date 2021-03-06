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
Route::post('/register', 'ApiAuthController@register');
Route::post('/login', 'ApiAuthController@login');

Route::get('articles', 'ArticleController@index');

Route::get('article/{id}', 'ArticleController@show');

Route::post('article', 'ArticleController@store');

Route::put('article', 'ArticleController@store');

Route::delete('article/{id}', 'ArticleController@destroy');

Route::get('articleinfo', 'Api\ArticleinfoController@index');
//Route::get('articleinfo/{id}', 'Api\ArticleinfoController@show');
Route::post('article/{post_id}/comment', 'Api\ArticleinfoController@store');
Route::delete('article/{a}/comment/{id}', 'Api\ArticleinfoController@destroy');