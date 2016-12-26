<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUserUpdateRequest extends Request
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
            //验证用户编辑输入
			// 'phone' => 'required|size:11|regex:/1\d{10}/',
            // 'header' => 'image',
        ];
    }
	
	public function messages()
	{
		return [
			// 'username.required' => '用户名不能为空',
			// 'phone.required' => '手机号码不能为空',
			// 'phone.size' => '手机号码长度为11位',
			// 'phone.regex' => '手机号码不正确',
			// 'header.image' => '只能上传图片(图片格式jpeg、png、bmp、gif、 或 svg )',
		];
		
	}
}
