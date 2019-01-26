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

Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');

Route::get('categories', 'Api\CategoriesController@index');
Route::get('categories/{id}', 'Api\CategoriesController@show');

Route::get('posts', 'Api\PostsController@index');
Route::get('posts/{id}', 'Api\PostsController@show');

Route::get('tags', 'Api\TagsController@index');
Route::get('tags/{id}', 'Api\TagsController@show');

Route::group(['middleware' => 'auth:api'], function(){

    Route::post('categories/{id}/delete', 'Api\CategoriesController@delete');
    Route::post('categories', 'Api\CategoriesController@store');

    Route::post('posts/{id}/delete', 'Api\PostsController@delete');
    Route::post('my/posts', 'Api\PostsController@myPosts');
    Route::post('posts', 'Api\PostsController@store');
    Route::post('posts/update/{id}','Api\PostsController@update');

    Route::post('tags/{id}/delete', 'Api\TagsController@delete');
    Route::post('tags', 'Api\TagsController@store');

});