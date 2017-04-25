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

Route::any('/admin/login','Admin\LoginController@login');
Route::get('/admin/code','Admin\LoginController@code');
Route::group(['middleware'=>['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function (){
    Route::any('index','IndexController@index');
    Route::any('info','IndexController@info');
    Route::any('quit','IndexController@quit');
    Route::any('pass','IndexController@pass');
    Route::resource('cate', 'CategoryController');
    Route::post('changeOrder','CategoryController@changeOrder');
    Route::any('test','CategoryController@test');
    Route::resource('article', 'ArticleController');
    Route::post('upload', 'CommonController@upload');
});
Route::get('/index','Home\IndexController@index');
Route::get('/cate/{id}','Home\IndexController@category');
Route::get('/auther','Home\IndexController@auther');
Route::get('/classify/{id}','Home\IndexController@classify');
Route::get('/article/{id}','Home\IndexController@article');

Route::get('/register','Home\RegisterController@register');//注册
Route::post('/register','Home\RegisterController@registerPost');//

Route::resource('/login','Home\LoginController');  //登陆
Route::get('code','Home\LoginController@code');
Route::group(['middleware'=>['web','user.login']],function (){
    Route::get('/blog','Home\IndexController@blog');//个人博客页
    Route::resource('info', 'Home\PersonInfoController');  //个人信息页
});



