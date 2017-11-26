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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::post('login', 'AuthController@authenticate');
Route::post('logout', 'AuthController@logout')->name('logout');

Route::group(['prefix' => 'permissions'], function() {
    Route::get('/roles', 'PermissionController@getRoles')->name('roles');
    Route::get('/edit/{name}', 'PermissionController@editRole')->name('role.permission.edit');
    Route::post('/update/{name}', 'PermissionController@updateRole');
});


/* @test routes */

Route::get('/post', 'PostController@index')->name('post');

Route::group(['middleware' => ['permission:publish articles']], function () {
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::get('/post/store', 'PostController@store')->name('post.store');
});
Route::group(['middleware' => ['permission:edit articles']], function () {
    Route::get('/post/edit', 'PostController@edit')->name('post.edit');
    Route::get('/post/update', 'PostController@update')->name('post.update');
});
Route::group(['middleware' => ['permission:delete articles']], function () {
    Route::get('/post/destroy', 'PostController@destroy')->name('post.destroy');
});

