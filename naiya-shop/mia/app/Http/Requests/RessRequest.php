<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RessRequest extends Request
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
            'name' => 'required',
			'detail' => 'required',
			'phone' => 'required',
        ];
    }
	public function messages()
	{
		return  [
			'name.required' => '收货人不能为空',
			'detail.required' => '详细地址不能为空',
			'phone.required' => '详细地址不能为空',
		];
	}
}
