<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 会员模块对应的模型类
class Userss extends Model
{
    //指定数据表users
	protected $table="users";
	// 指定的主键
	protected $primarykey="id";
	// 该模型是否需要时间戳维护  false 不需要  true 需要
	public $timestamps = true;
	// 给模型类里指定模型可以给数据表赋值的字段
	protected $fillable = ['username','password','email','status','token','phone'];

	// 修改器 对获取到的status值 做处理
		public function getStatusAttribute($value){
			 $status =[1=>'未激活',2=>'激活'];

			 return  $status[$value];
		}
		// 获取会员关联的会员详情
		public function info(){
			// hasOne 是一对一  users_id 是关联的字段
			return $this->hasOne('App\Models\Userinfo','users_id');
		}

		// 获取会员关联的收货地址
		public function useraddress(){
			return $this->hasMany("App\Models\Useraddress",'user_id');
		}
}
