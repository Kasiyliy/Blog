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


Route::get('/secure/config/migrate-refresh', ['uses' => 'ConfigController@migrateRefresh']);
Route::get('/secure/config/migrate', ['uses' => 'ConfigController@migrate']);
Route::get('/secure/config/db-seed', ['uses' => 'ConfigController@dbSeed']);
Route::get('/secure/config/clear-autoload', ['uses' => 'ConfigController@clearAutoLoad']);
Route::get('/secure/config/config-cache', ['uses' => 'ConfigController@configCache']);
Route::get('/secure/config/key-generate', ['uses' => 'ConfigController@keyGenerate']);
Route::get('/secure/config/optimize', ['uses' => 'ConfigController@optimize']);


Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/post/{slug}',[
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}',[
   'uses' => 'FrontEndController@category',
   'as' => 'category.single'
]);

Route::get('/tag/{id}',[
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Route::get('/results',function() {

    $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();
    return view('results')
        ->with('posts',$posts)
        ->with('title', 'Search results: ' .request('query'))
        ->with('settings', \App\Setting::first())
        ->with('categories', \App\Category::take(5)->get())
        ->with('query',request('query'));
});


Route::post('/follow/{id}',[
    'uses' => 'FollowersController@follow',
    'as' => 'follow'
]);

Route::post('/followers/delete/{id}',[
    'uses' => 'FollowersController@destroy',
    'as' => 'followers.delete'
]);


Route::get('/followers',[
    'uses' => 'FollowersController@index',
    'as' => 'follower.index'
]);



Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {


    Route::get('/dashboard', 'HomeController@index')->name('home');


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

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'user.index'
    ]);

    Route::get('/users/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/users/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    Route::get('/users/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'user.admin',
    ])->middleware('admin');

    Route::get('/users/remove/admin/{id}',[
        'uses' => 'UsersController@removeAdmin',
        'as' => 'user.admin.remove',
    ])->middleware('admin');

    Route::get('/user/profile',[
        'uses'=> 'ProfilesController@index',
        'as' => 'user.profile',
    ]);

    Route::post('/user/profile/update',[
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update',
    ]);

    Route::get('/user/delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete',
    ]);

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings',
        ]);

    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update',
    ]);




});

