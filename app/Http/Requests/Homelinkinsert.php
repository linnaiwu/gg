<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Homelinkinsert extends FormRequest
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
            'lname'=>'required',
            'lurl'=>'required|url',
            'email'=>'required|email',
            'descr'=>'required'
        ];
    }

    public function messages(){
        return [
            'lname.required'=>'名字不能为空',
            'lurl.required'=>'地址不能为空',
            'lurl.url'=>'url格式不对',
            'email.required'=>'Email不能为空',
            'email.email'=>'email格式不对',
            'descr.required'=>'网站介绍不能为空'
        ];
    }
}
