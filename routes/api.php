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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('categories', 'API\CategoriesController@index');
Route::get('categories/{id}', 'API\CategoriesController@show');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('categories/{id}/delete', 'API\CategoriesController@delete');
});