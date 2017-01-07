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

Route::any('/test', 'HomeController@test');

Route::get('/', 'HomeController@index');

//首页相关
Route::group(['prefix' => 'home'], function () {
    //首页路由
    Route::get('/', 'HomeController@index');
    //初始化
    Route::get('/init', 'HomeController@getIndexData');
    //文章搜索
    Route::get('/article', 'HomeController@searchArticles');
});

//文章相关
Route::group(['prefix' => 'article'], function () {
    //路由详情页
    Route::get('/detail/{id}', 'ArticleController@detail');
    //详情页初始化
    Route::get('/detail/init/{id}', 'ArticleController@getDetailData');

    Route::group(['middleware' => 'auth'], function () {
        //加油接口
        Route::get('/cheer/{id}', 'ArticleController@cheer');
        //评论接口
        Route::post('/comment', 'ArticleController@addComment');
    });
});

//论坛相关
Route::group(['prefix' => 'forum'], function () {
    //首页路由
    Route::get('/', 'ForumController@index');
    //初始化
    Route::get('/init', 'ForumController@getIndexData');
    //帖子搜索
    Route::get('/post', 'ForumController@searchPosts');
    //帖子详情路由
    Route::get('/post/detail/{id}', 'ForumController@postDetail');
    //帖子详情数据初始化接口
    Route::get('/post/detail/init/{id}', 'ForumController@getPostDetailData');

    Route::group(['middleware' => 'auth'], function () {
        //加油接口
        Route::get('/post/cheer/{id}', 'ForumController@cheerPost');
        //评论接口
        Route::post('/post/comment', 'ForumController@addPostComment');
    });
});

Route::group(['middleware' => 'auth'], function () {
    //短信验证码
    Route::get('/verification_sms/{action}/{mobile}', 'SmsController@sendVerificationSms');

    //快捷登陆
    Route::post('/quick_login', 'Auth\LoginController@quickLogin');

    //用户
    Route::group(['prefix' => 'user'], function () {
        //补充注册信息
        Route::get('/supplementary_information', 'UserController@supplementaryInformation');
        Route::post('/supplementary_information', 'UserController@supplementaryInformationSubmit');

        //基本信息
        Route::get('/basic_information', 'UserController@basicInformation');
        Route::post('/basic_information', 'UserController@basicInformationSubmit');

        //病理信息
        Route::get('/pathological_information', 'UserController@pathologicalInformation');
        Route::post('/pathological_information', 'UserController@pathologicalInformationSubmit');

        //肿瘤功能指标首次填写
        Route::get('/tumor_function_index/first_add', 'UserController@firstAddTumorIndexInformation');
        Route::post('/tumor_function_index/first_add', 'UserController@firstAddTumorIndexInformationSubmit');

        //肝功能指标首次填写
        Route::get('/liver_function_index/first_add', 'UserController@firstAddLiverIndexInformation');
        Route::post('/liver_function_index/first_add', 'UserController@firstAddLiverIndexInformationSubmit');

        //肾功能指标首次填写
        Route::get('/renal_function_index/first_add', 'UserController@firstAddRenalIndexInformation');
        Route::post('/renal_function_index/first_add', 'UserController@firstAddRenalIndexInformationSubmit');

        //心脏功能指标首次填写
        Route::get('/heart_function_index/first_add', 'UserController@firstAddHeartIndexInformation');
        Route::post('/heart_function_index/first_add', 'UserController@firstAddHeartIndexInformationSubmit');

        //免疫功能指标首次填写
        Route::get('/immunity_function_index/first_add', 'UserController@firstAddImmunityIndexInformation');
        Route::post('/immunity_function_index/first_add', 'UserController@firstAddImmunityIndexInformationSubmit');
    });
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
        Route::post('/index_data', 'UserController@getIndexData');
        Route::get('/disable/{id}', 'UserController@disableUser');
    });

    //论坛
    Route::group(['prefix' => 'post', 'namespace' => 'Forum'], function () {
        Route::get('/list', 'PostController@index');
        Route::get('/edit/{id}', 'PostController@edit');
        Route::get('/disable/{id}', 'PostController@disable');
        Route::get('/disable_comment/{type}/{id}', 'PostController@disableComment');
    });
});



