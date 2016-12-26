<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'email' => 'required|email',
			'password' => 'required',
			'authcode' => 'required',
        ];
    }
	
	public function messages()
	{
		return  [
			'email.required' => '邮箱不能为空',
			'email.email' => '邮箱格式不正确',
			'password.required' => '密码不能为空',
			'authcode.required' => '验证码不能为空',
		];
	}
}
