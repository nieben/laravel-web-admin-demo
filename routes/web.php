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
    Route::post('/upload_file', 'FileController@upload');

    //文章
    Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
        Route::get('/list', 'ArticleController@index');
        Route::get('/add', 'ArticleController@add');
        Route::post('/add', 'ArticleController@addSubmit');
        Route::get('/edit/{id}', 'ArticleController@edit');
        Route::post('/edit', 'ArticleController@editSubmit');
        Route::get('/disable/{id}', 'ArticleController@disable');
        Route::get('/disable_comment/{type}/{id}', 'ArticleController@disableComment');
    });

    //banner
    Route::group(['prefix' => 'banner', 'namespace' => 'Banner'], function () {
        Route::get('/list', 'BannerController@index');
        Route::get('/add', 'BannerController@add');
        Route::post('/add', 'BannerController@addSubmit');
        Route::get('/edit/{id}', 'BannerController@edit');
        Route::post('/edit', 'BannerController@editSubmit');
    });

    //标签
    Route::group(['prefix' => 'label', 'namespace' => 'Label'], function () {
        Route::get('/list', 'LabelController@index');
        Route::get('/add', 'LabelController@add');
        Route::post('/add', 'LabelController@addSubmit');
        Route::get('/edit/{type}/{id}', 'LabelController@edit');
    });

    //用户
    Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
        Route::get('/list', 'UserController@index');
        Route::get('/edit/{id}', 'UserController@edit');
        Route::post('/remark', 'UserController@updateRemark');
    });
});



