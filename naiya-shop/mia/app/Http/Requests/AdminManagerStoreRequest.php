<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminManagerStoreRequest extends Request
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
            //验证管理员身份
			'username' => 'unique:admin,username|required',
			'password' => 'required',
			'repassword' => 'required|same:password',
			'header' => 'image'
        ];
    }
	
	public function messages()
	{
		return [
			'username.unique' => '账号已存在',
			'username.required' => '账号不能为空',
			'password.required' => '密码不能为空',
			'repassword.required' => '确认密码不能为空',
			'repassword.same' => '两次密码不一致',
			'header.image' => '上传图片格式为( jpeg、png、bmp、gif、 或 svg )'
			
		];
		
	}
}
