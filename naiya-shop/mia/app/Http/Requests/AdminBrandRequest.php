<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminBrandRequest extends Request
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
            //验证品牌输入
			//'name' => 'unique:brand,name|required',
			'img' => 'image',
			'desc' => 'required'
        ];
    }
	
	public function messages()
	{
		return [
			'name.required' => '品牌名称不能为空',
			'name.unique' => '商品名称已存在',
			'img.image' => '只能上传图片(图片格式jpeg、png、bmp、gif、或 svg )' ,
			'desc.required' => '描述不能为空'
		];
		
	}
}
