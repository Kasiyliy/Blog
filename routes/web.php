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

Route::get('/test', function(){
    return (App\Profile::find(1)->user);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {


    Route::get('/home', 'HomeController@index')->name('home');


    Route::get('/post/create', [
        'uses'=>'PostsController@create',
        'as' => 'post.create'
    ]);

    Route::post('/post/store', [
        'uses'=>'PostsController@store',
        'as' => 'post.store'
    ]);

    Route::get('/posts', [
        'uses'=>'PostsController@index',
        'as' => 'post.index'
    ]);

    Route::get('/posts/trashed', [
        'uses'=>'PostsController@trashed',
        'as' => 'post.trashed'
    ]);

    Route::get('/post/delete/{id}', [
        'uses'=>'PostsController@destroy',
        'as' => 'post.delete'
    ]);

    Route::get('/post/kill/{id}', [
        'uses'=>'PostsController@kill',
        'as' => 'post.kill'
    ]);

    Route::get('/post/restore/{id}', [
        'uses'=>'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/post/edit/{id}', [
        'uses'=>'PostsController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/post/update/{id}', [
        'uses'=>'PostsController@update',
        'as' => 'post.update'
    ]);

    Route::get('/category/create', [
        'uses'=>'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::get('/categories', [
        'uses'=>'CategoriesController@index',
        'as' => 'category.index'
    ]);

    Route::post('/category/store', [
        'uses'=>'CategoriesController@store',
        'as' => 'category.store'
    ]);

    Route::get('/category/edit/{id}', [
        'uses'=>'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    Route::post('/category/update/{id}', [
        'uses'=>'CategoriesController@update',
        'as' => 'category.update'
    ]);

    Route::get('/category/delete/{id}', [
        'uses'=>'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

    Route::get('/tags/create',[
        'uses' =>'TagsController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tags/store' , [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    Route::get('/tags',[
        'uses' => 'TagsController@index',
        'as' => 'tag.index'
    ]);

    Route::get('/tags/edit/{id}' , [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    Route::post('/tags/update/{id}' , [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/tags/delete/{id}' , [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);
});

