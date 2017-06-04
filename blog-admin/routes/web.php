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
//    Route::resource('cate', 'CategoryController');
    Route::post('changeOrder', 'CategoryController@changeOrder');
    Route::any('test', 'CategoryController@test');
   // Route::resource('article', 'ArticleController');
     Route::post('upload', 'CommonController@upload');

    Route::get('check','PermissionController@check');// roleToUser
    Route::get('noAllow','PermissionController@noAllow');//跳转到无权限页面




});
//文章管理
Route::group(['prefix' => 'admin', 'middleware' => ['role:root|article_admin'],'namespace' => 'Admin'], function() {
    Route::resource('cate', 'CategoryController');//分类管理
    Route::resource('article', 'ArticleController');//文章管理
    Route::get('article/verify/{id}','ArticleController@verify');//文章审核

    Route::get('comment','ArticleController@comment');//评论管理 commentDelete
    Route::delete('comment/{id}','ArticleController@commentDelete');//评论删除

    Route::get('reply','ArticleController@reply');//回复管理
    Route::delete('reply/{id}','ArticleController@replyDelete');//回复删除


});
//话题管理
Route::group(['prefix'=>'admin','middleware'=>['role:root|topic_admin'],'namespace'=>'Admin'],function (){

    Route::get('topic','TopicController@topic');//话题管理
    Route::delete('topic/{id}','TopicController@topicDelete');//话题删除

    Route::get('follower','TopicController@follower');//跟帖管理
    Route::delete('follower/{id}','TopicController@followerDelete');//跟帖删除

    Route::get('followerComment','TopicController@followerComment');//回复管理
    Route::delete('followerComment/{id}','TopicController@followerCommentDelete');//回复删除

    Route::get('text','TopicController@findIds');//话题管理
});

//会员管理
Route::group(['prefix'=>'admin','middleware'=>['role:root|user_admin'],'namespace'=>'Admin'],function (){

    Route::get('user','UserController@user');//会员管理
    Route::post('updateStatus','UserController@updateStatus');//updateStatus
    Route::delete('user/{id}','UserController@userDelete');//会员删除

    Route::get('column_vefify','UserController@column_vefify');//专栏管理
    Route::post('column_pass','UserController@column_pass');//专栏审核—通过审核 column_delete
    Route::post('column_delete','UserController@column_delete');//专栏审核—通过审核 column_delete

});

//权限管理
Route::group(['prefix'=>'admin','middleware'=>['role:root'],'namespace'=>'Admin'],function (){

    Route::resource('admin_user','AdminUserController');//管理员管理 ： 新增／删除 管理员，，管理员列表：为管理员新增角色 ，

    Route::resource('role','RoleController');//新增删除角色

    Route::get('list','RoleController@roleList');//角色列表
    Route::post('list','RoleController@sumId');//角色id汇总
    Route::post('roleToUser','RoleController@roleToUser');// roleToUser
    Route::delete('userRole','RoleController@deleteUserRole');//删除该用户对应的角色


});


Route::get('/index', 'Home\IndexController@index');
Route::get('/cate/{id}', 'Home\IndexController@category');
Route::get('/auther', 'Home\IndexController@auther');
Route::get('/classify/{id}', 'Home\IndexController@classify');
Route::get('/article/{id}', 'Home\IndexController@article');//文章页

Route::get('/register', 'Home\RegisterController@register');//注册
Route::post('/register', 'Home\RegisterController@registerPost');//

Route::resource('/login', 'Home\LoginController');  //登陆
Route::get('code', 'Home\LoginController@code');

Route::resource('home/comment','Home\CommentController',['only'=>['store','destroy']]);//发表评论
Route::get('home/blog/{check}/{userId}', 'Home\IndexController@blog')->name('myself_blog');//个人博客页
Route::resource('home/topic','Home\TopicController');//话题讨论

Route::get('search','Home\IndexController@search');//搜索
Route::post('column','Home\IndexController@column');//搜索

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
    Route::post('home/message/reply','Home\MessageController@reply');//留言回复
    Route::post('home/message/delete','Home\MessageController@delete');//留言删除
    Route::post('home/message/replyDelete','Home\MessageController@replyDelete');//留言回复删除

    Route::resource('home/topic','Home\TopicController');//话题讨论
    Route::post('home/topic/follower/{id}','Home\TopicController@followerAdd');//跟楼
    Route::post('home/topic/reply','Home\TopicController@replyAdd');//跟帖的回复

    Route::post('home/collect','Home\CollectController@add');//收藏
    Route::delete('home/collect','Home\CollectController@delete');//取消收藏
    Route::get('home/collect/{id}','Home\CollectController@index');//收藏列表

    Route::get('/recomment','Home\CollectController@recomment');//recomment


});


Route::get('password/email','Home\PasswordController@getEmail');// 忘记密码
Route::post('password/email','Home\PasswordController@postEmail');
Route::get('password/reset/{token}','Home\PasswordController@getReset')->name('reset_email');
Route::post('password/reset','Home\PasswordController@postReset');

