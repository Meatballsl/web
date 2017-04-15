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
Route::get('/cate','Home\IndexController@category');
Route::get('/auther','Home\IndexController@auther');
Route::get('/classify','Home\IndexController@classify');
Route::get('/article','Home\IndexController@article');
Route::get('/blog','Home\IndexController@blog');//要先登录哦





