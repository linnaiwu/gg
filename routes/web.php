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


// 后台搭建
Route::resource("/admin","Admin\AdminController");
// 后台用户模块
Route::resource("/adminuser","Admin\UsersController");
// 后台用户Ajax删除
Route::get("/adminuserdel","Admin\UsersController@del");
// 会员收货地址
Route::get("/adminuseraddress/{id}","Admin\UsersController@address");
//后台无限分类模块
Route::resource("/admincate","Admin\CateController");
//后台轮播图
Route::resource("/slides","Admin\SliController");





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
