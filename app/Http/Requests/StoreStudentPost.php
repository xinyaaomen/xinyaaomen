<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreStudentPost extends FormRequest
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
            's_name'=>[
                'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
                Rule::unique('student')->ignore(request()->id,'s_id'),
            ],
            //'s_name' => 'unique:student|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
            's_chengji'=>'required|integer|between:1,100'
        ];
    }
    public function messages(){
        return [
            's_name.unique'=>'名字已存在',
            'regex'=>'名字需由中文组成长度为2-12位',
            's_chengji.required'=>'成绩不能为空',
            's_chengji.integer'=>'成绩必须位数字',
            's_chengji.between'=>'成绩数据不合法',
        ];
    }
}
