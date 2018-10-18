<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeUserinsert extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         // username 校验的参数   required 校验规则 用户名不能为空
            'username'=>'required|regex:/\w{4,8}/|unique:users',
            'password'=>'required|regex:/\w{6,16}/',
            'repassword'=>'required|regex:/\w{6,16}/|same:password',
            'email'=>'required|email'

        ]; 
    }

    // 自定义错误消息
    public function messages(){
        return [
            'username.required'=>'用户名不能为空',
            'username.regex'=>'用户名必须是4-8位任意数字字母',
            'username.unique'=>'用户名重复',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码必须是6-16位数字下划线字母',
            'repassword.required'=>'确认密码不能为空',
            'repassword.regex'=>'确认密码必须是6-16位数字下划线字母',
            'repassword.same'=>'两次密码不一致',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不对',

        ];
    }
}
