<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminMerchantStoreRequest extends Request
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
            //验证商户添加
			'username' => 'unique:merchant,username|required',
			'name' => 'unique:merchant,name|required',
			'password' => 'required',
			'repassword' => 'required|same:password',
			'logo' => 'image',
			'desc' => 'required'
        ];
    }
	
	public function messages()
	{
		return [
			'username.required' => '商户登录名不能为空',
			'username.unique' => '商户登录名已存在',
			'name.required' => '商户名称不能为空',
			'name.unique' => '商户名称已存在',
			'password.required' => '密码不能为空',
			'repassword.required' => '确认密码不能为空',
			'repassword.same' => '两次密码输入不一致',
			'logo.image' => '图片格式为（ jpeg、png、bmp、gif、 或 svg ）',
			'desc.required' => '商铺详情不能为空'
		];
	}
}
