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

Route::any('/admin/login', 'Admin\LoginController@login');
Route::get('/admin/code', 'Admin\LoginController@code');
Route::group(['middleware' => ['web', 'admin.login'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::any('index', 'IndexController@index');
    Route::any('info', 'IndexController@info');
    Route::any('quit', 'IndexController@quit');
    Route::any('pass', 'IndexController@pass');
    Route::resource('cate', 'CategoryController');
    Route::post('changeOrder', 'CategoryController@changeOrder');
    Route::any('test', 'CategoryController@test');
    Route::resource('article', 'ArticleController');
    Route::post('upload', 'CommonController@upload');
});
Route::get('/index', 'Home\IndexController@index');
Route::get('/cate/{id}', 'Home\IndexController@category');
Route::get('/auther', 'Home\IndexController@auther');
Route::get('/classify/{id}', 'Home\IndexController@classify');
Route::get('/article/{id}', 'Home\IndexController@article');

Route::get('/register', 'Home\RegisterController@register');//注册
Route::post('/register', 'Home\RegisterController@registerPost');//

Route::resource('/login', 'Home\LoginController');  //登陆
Route::get('code', 'Home\LoginController@code');

Route::resource('home/comment','Home\CommentController',['only'=>['store','destroy']]);//发表评论
Route::get('home/blog/{check}/{userId}', 'Home\IndexController@blog')->name('myself_blog');//个人博客页
Route::group(['middleware' => ['web', 'user.login']], function () {

    Route::get('home/person/{id}', 'Home\PersonInfoController@index');  //个人主页信息页
    Route::resource('home/info', 'Home\InfoController');  //个人信息页
    Route::resource('home/article', 'Home\ArticleController');
    Route::any('home/quit', 'Home\IndexController@quit');//退出
    Route::any('home/email', 'Home\EmailController@index');//邮箱
    Route::get('home/emailSend', 'Home\EmailController@emailSend');//邮箱
    Route::get('signup/confirm/{token}', 'Home\EmailController@confirmEmail')->name('confirm_email');

    Route::get('home/users/{id}/followings','Home\PersonInfoController@followings')->name('users.followings');//关注列表
    Route::get('home/users/{id}/followers','Home\PersonInfoController@followers')->name('users.followers');//粉丝列表
    Route::post('home/users/followers/{id}', 'Home\PersonInfoController@store')->name('followers.store');//关注
    Route::delete('home/users/followers/{id}', 'Home\PersonInfoController@destroy')->name('followers.destroy'); //取消关注
    Route::get('home/comment', 'Home\CommentController@index');//评论

    Route::post('home/comment/reply', 'Home\ReplyController@replayToComment');//回复评论

    Route::resource('home/message', 'Home\MessageController');  //留言功能





});


Route::get('password/email','Home\PasswordController@getEmail');// 忘记密码
Route::post('password/email','Home\PasswordController@postEmail');
Route::get('password/reset/{token}','Home\PasswordController@getReset')->name('reset_email');
Route::post('password/reset','Home\PasswordController@postReset');

