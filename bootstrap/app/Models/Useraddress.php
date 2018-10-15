<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    // 指定数据表 address
		protected $table = "address";
		// 指定主键
		protected $primarykey = "id";
		// 该模型是否需要时间戳维护
		public $timestamps = false;
		// 在模型类里指定下模型可以给数据表赋值的字段
		protected $fillable = ['name','user_id','phone','huo'];
}
