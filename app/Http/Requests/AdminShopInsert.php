<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminShopInsert extends FormRequest
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
            'name'=>'required',
            'cate_id'=>'required',
            'price'=>'required|regex:/^[0-9]+$/',
            'stock'=>'required',
            'producer'=>'required',
            'display'=>'required',
            'descr'=>'required',
            'pic'=>'required'

        ];
    }
    public function messages(){
        return [
            'name.required'=>'★商品名字不能为空',
            'cate_id.required'=>'★商品分类不能为空',
            'price.required'=>'★商品价格不能为空',
            'price.regex'=>'★商品价格不能乱写',
            'stock.required'=>'★商品库存不能为空',
            'producer.required'=>'★商品产地不能为空',
            'display.required'=>'★商品状态不能为空',
            'descr.required'=>'★商品详情不能为空',
            'pic.required'=>'★商品图片不能为空'
            
        ];
    }
}
