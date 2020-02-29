<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBrandPost extends FormRequest
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
        // return [
        //     'b_name' => 'required|unique:Brand|max:12|min:2',
        // ];
        return [
            'b_name'=>[
                'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
                Rule::unique('brand')->ignore(request()->id,'b_id'),
            ],
        ];
    }
    public function messages(){
        return [
            'b_name.unique'=>'商品名字已存在',
            'regex'=>'名字需由中文组成长度为2-12位',
            ];
    }
}
