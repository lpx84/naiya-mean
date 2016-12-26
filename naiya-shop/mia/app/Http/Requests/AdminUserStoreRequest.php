<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUserStoreRequest extends Request
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
            //用户验证
			'username' => 'unique:user,username|required',
			'password' => 'required',
			'repassword' => 'required|same:password',
			'phone' => 'required|size:11|regex:/1\d{10}/',
			'email' => 'unique:user,email|required|email',
			'header' => 'image',
        ];
    }
	
	public function messages()
	{
		return [
			'username.unique' => '用户名已存在',
			'username.required' => '用户名不能为空',
			'password.required' => '密码不能为空',
			'repassword.required' => '确认密码不能为空',
			'repassword.same' => '两次密码不一致',
			'phone.required' => '手机号码不能为空',
			'phone.size' => '手机号码长度为11位',
			'phone.regex' => '手机号码不正确',
			'email.unique' => '邮箱账号已存在',
			'email.required' => '邮箱不能为空',
			'email.email' => '请输入正确的邮箱格式',
			'header.image' => '只能上传图片(图片格式jpeg、png、bmp、gif、 或 svg )',
		
		];
		
	}
}
