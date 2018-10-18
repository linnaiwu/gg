<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeResetinsert extends FormRequest
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

            'password'=>'required|regex:/\w{6,16}/',
            'repassword'=>'required|regex:/\w{6,16}/|same:password'


        ]; 
    }

    // 自定义错误消息
    public function messages(){
        return [
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码必须是6-16位数字下划线字母',
            'repassword.required'=>'确认密码不能为空',
            'repassword.regex'=>'确认密码必须是6-16位数字下划线字母',
            'repassword.same'=>'两次密码不一致'
        ];
    }
}
