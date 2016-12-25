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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
});



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
});

Route::group(['middleware' => 'auth.admin:admin', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
        Route::get('/list', 'ArticleController@index');
        Route::get('/add', 'ArticleController@add');
        Route::post('/add', 'ArticleController@addSubmit');
        Route::get('/edit/{id}', 'ArticleController@edit');
        Route::post('/edit', 'ArticleController@editSubmit');
    });
});



