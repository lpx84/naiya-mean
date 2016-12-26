<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminAttrRequest extends Request
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
            //验证
			'name' => 'required',
			'value' => 'unique:attr_value,value|required'
        ];
    }
	
	public function messages()
	{
		return [
			'name.required' => '属性名不能为空！',
			'value.required' => '属性值不能为空！',
			'value.unique' => '属性值已存在'
		];
	}
}
