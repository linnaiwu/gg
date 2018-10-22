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
		Route::resource("/adminusers","Admin\AdminuserController");
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
		// 权限管理添加
		Route::resource("/nodelist","Admin\NodelistController");
		// 会员Ajax分页
		Route::resource("/adminuserss","Admin\UserController");
		// Ajax 批量删除数据
		Route::get("/dels","Admin\AdminuserController@del");
		// 商品管理
		Route::resource("/adminshop","Admin\ShopController");
		//友情链接列表
		Route::resource("/linklist","Admin\LinklistController");
		Route::get('/doedit','Admin\LinklistController@doedit');
		//订单列表
		Route::resource("/adminorderlist","Admin\OrderController");
		//后台支付状态
		Route::get("/adminorderstatus/{id}","Admin\OrderController@status");
});


// 前台首页
Route::resource("/home","Home\HomeController");
Route::resource("/","Home\HomeController");
//前台公告
Route::get("/gonggao/{id}","Home\HomeController@gonggao");
// 前台商品
Route::resource("/shop","Home\ShopController");
// 商品详情
Route::resource("/details","Home\DetailsController");

//友情链接
Route::resource("/link","Home\LinkController");

	//前台注册
	Route::resource("/register","Home\RegisterController");
	//前台登录
	Route::resource("/homelogin","Home\HomeloginController");
	//找回密码
	Route::get("/forget","Home\HomeloginController@forget");
	//邮箱找回
	Route::get("/emailget","Home\HomeloginController@emailget");
	Route::post("/doemailget","Home\HomeloginController@doemailget");
	Route::get("/reset","Home\HomeloginController@reset");
	Route::post("/doreset","Home\HomeloginController@doreset");
		//短信找回
	Route::get("/phone","Home\HomeloginController@phone");
	Route::get("/dophone","Home\HomeloginController@dophone");
	Route::post("/dodophone","Home\HomeloginController@dodophone");
		//收货地址
	Route::resource("/address","Home\AddressController");
	Route::get("/ajaxaddr","Home\AddressController@ajaxaddr");
	Route::get("/addrdel","Home\AddressController@addrdel");
	Route::get("/status","Home\AddressController@status");
	//测试邮件发送
	Route::get("/send","Home\RegisterController@send");
	//测试邮件发送2
	//Route::get("/send1","Home\RegisterController@sendMail");
	//验证码
	Route::get("/code","Home\RegisterController@code");
	//激活
	Route::get("/jihuo","Home\RegisterController@jihuo");
	//购物车
	Route::resource('/Cart',"Home\CartController");
	//加操作
	Route::get('/jia',"Home\CartController@jia");
	//减操作
	Route::get('/jian',"Home\CartController@jian");	
	//购物车删除
	Route::get('/Carts/{id}',"Home\CartController@del");
	//确认订单
	Route::resource('/order',"Home\OrderlistController");
	//提交订单
	Route::post('/orders',"Home\OrderlistController@order");
	//结算页
	Route::get("/ordersss/{aid}","Home\OrderlistController@orders");
	//提交订单
	Route::get("/orderlist","Home\OrderlistController@orderlist");
	//支付状态
	Route::get("/zt/{id}","Home\OrderlistController@status");
	//取消订单
	Route::get("/ddxh/{id}",'Home\OrderlistController@del');
	//支付宝接口调用
	Route::get("/pays/{id}","Home\PayController@zfb");

