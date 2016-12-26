<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordRequest extends Request
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
			'password' => 'required',
			'newPassword' => 'required',
			'confirmNewPassword' =>'required|same:newPassword',
			'authcode' => 'required',
        ];
    }
	
	public function messages()
	{
		return  [
			'password.required' => '当前不能为空',
			'newPassword.required' => '新密码不能为空',
			'confirmNewPassword.required' => '确认新密码不能为空',
			'confirmNewPassword.same' => '新密码与确认密码不同',
			'authcode.required' => '验证码不能为空',
		];
	}
}
