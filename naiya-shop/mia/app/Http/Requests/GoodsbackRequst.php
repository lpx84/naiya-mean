<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodsbackRequst extends Request
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
            'company' => 'required',
			'logi_no' => 'required',
			
        ];
    }
	
	public function messages()
	{
		 return [
            'company.required' => '物流公司名不能为空',
			'logi_no.required' => '物流单号不能为空',
			
        ];
	}
}
