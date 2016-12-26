<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MerchantRegisterRequest extends Request
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
            'username' => 'required|unique:merchant|min:6',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
            'name' => 'required',
            'logo' => 'required|image|max:2048',
            'desc' => 'required',
            'realname' => 'required',
            'sex' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'cid_no' => 'required|size:18',
            'cid_img' => 'required|image|max:10240',
        ];
    }
    
    /**
     * 提示信息
     */
    public function messages()
    {
        return [
            'username.required' => '用户名不能为空',
            'username.unique' => '用户名已存在',
            'username.min' => '用户名最少6位',
            'password.required' => '密码不能为空',
            'password.min' => '密码最少6位',
            'repassword.required' => '确认密码不能为空',
            'repassword.same' => '两次密码不一至',
            'name.required' => '商户名称不能为空',
            'logo.required' => '商户LOGO不能为空',
            'logo.image' => '商户LOGO的图片格式不正确',
            'logo.max' => '商户LOGO的图片大小不能超过2M',
            'desc.required' => '商户描述不能为空',
            'realname.required' => '商户负责人真实姓名不能为空',
            'sex.required' => '商户负责人性别不能为空',
            'phone.required' => '商户负责人手机号不能为空',
            //'phone.regex' => '商户负责人手机号不正确',
            'email.required' => '商户负责人Email不能为空',
            'email.email' => '商户负责人Email不正确',
            'cid_no.required' => '商户负责人身份证号不能为空',
            'cid_no.size' => '商户负责人身份证号长度18位',
            'cid_img.required' => '商户负责人手持证件照片不能为空',
            'cid_img.image' => '商户负责人手持证件照片的图片格式不正确',
            'cid_img.max' => '商户负责人手持证件照片的图片大小不能超过2M',
            
        ];
    }
}
