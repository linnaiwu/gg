<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //指定数据表users
		protected $table = "users_info";
		// 指定主键
		protected $primarykey = "id";
		// 该模型是否需要时间戳维护 
		public $timestamps = false;
		// 在模型类里指定下模型可以给数据表赋值的字段
		protected $fillable = ['hobby','sex','users_id'] ;
}
