<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'authcode' => 'required',
            'emailcode' => 'required',
			'password' => 'required',
			'confirm_password' => 'required|same:password',
        ];
    }
    
    public function messages()
    {
        return [
            'email.required' => 'Email不能为空',
			'email.email' => 'Email格式不正确',
            'authcode.required' => '验证码不能为空',
            'emailcode.required' => '邮箱验证码不能为空',
			'password.required' => '密码不能为空',
			'confirm_password.required' => '确认密码不能为空',
			'confirm_password.same' => '两次输入的密码不同',
        ];
    }
}
