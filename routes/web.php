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



// 后台登录退出
Route::resource("adminlogin","Admin\AdminLoginController");

Route::group(['middleware'=>'adminlogin'],function(){
	
		// 后台搭建
		Route::resource("/admin","Admin\AdminController");
		// 会员模块
		Route::resource("/adminuser","Admin\UsersController");
		// 后台用户Ajax删除
		Route::get("/adminuserdel","Admin\UsersController@del");
		// 会员收货地址
		Route::get("/adminuseraddress/{id}","Admin\UsersController@address");
		//后台无限分类模块
		Route::resource("/admincate","Admin\CateController");
		// 后台管理员模块
		Route::resource("adminusers","Admin\AdminuserController");
		//后台轮播图
		Route::resource("/slides","Admin\SliController");
		//后台广告
		Route::resource("/gg","Admin\GgController");
		//后台公告
		Route::resource("/notice","Admin\NoticeController");
		// 分配角色
		Route::get("/adminrole/{id}","Admin\AdminuserController@rolelist");
		// 保存角色
		Route::post("/saverole","Admin\AdminuserController@saverole");
		// 角色管理
		Route::resource("/rolelist","Admin\RolelistController");
		// 分配权限
		Route::get("/auth/{id}","Admin\RolelistController@auth");
		// 权限保存
		Route::post("/saveauth","Admin\RolelistController@saveauth");
		// 权限管理
		Route::resource("/nodelist","Admin\NodelistController");
		// 会员Ajax分页
		Route::resource("/adminuserss","Admin\UserController");
		// Ajax 批量删除数据
		Route::get("/dels","Admin\AdminuserController@del");

});


// 前台首页
Route::resource("/homeindex","Home\IndexController");







// // 调用自定义函数
// Route::get("/func","Admin\UsersController@func");

// // 调用自定义的三方类方法
// Route::get("/cc","Admin\UsersController@cc");

// // laravel调用云之讯短信接口
// Route::get("/message","Admin\UsersController@message");

// // 支付宝接口调用
// Route::resource("/pays","Home\PayController");

// // 通知界面
// Route::get("/returnurl","Home\PayController@returnurl");
