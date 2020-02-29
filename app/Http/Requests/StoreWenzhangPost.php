<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWenzhangPost extends FormRequest
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
            'w_name'=>[
                'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
                Rule::unique('wenzhang')->ignore(request()->id,'w_id'),
            ],
            //'s_name' => 'unique:student|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
            'w_zuozhe'=>'required',
            'w_email'=>'required',
            'w_gjz'=>'required',
            'w_miaoshu'=>'required'
        ];
    }
     public function messages(){
        return [
            'w_name.unique'=>'标题已存在',
            'regex'=>'名字需由中文组成长度为2-12位',
            'w_zuozhe.required'=>'作者不能为空',
            'w_email.required'=>'邮箱不能为空',
            'w_gjz.required'=>'关键字',
            'w_miaoshu.required'=>'描述不能为空',
        ];
    }
}
