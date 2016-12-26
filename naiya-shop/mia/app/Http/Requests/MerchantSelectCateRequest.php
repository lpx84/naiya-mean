<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MerchantSelectCateRequest extends Request
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
            'oneId' => 'required|integer|min:1',
            'twoId' => 'required|integer|min:1',
            'threeId' => 'required|integer|min:1',
        ];
    }
    
    public function messages()
    {
        return [
            'oneId.required' => '一级分类不能为空',
            'oneId.integer' => '请选择一级分类',
            'oneId.min' => '请正确选择一级分类',
            'twoId.required' => '二级分类不能为空',
            'twoId.integer' => '请选择二级分类',
            'twoId.min' => '请正确选择二级分类',
            'threeId.required' => '三级分类不能为空',
            'threeId.integer' => '请选择三级分类',
            'threeId.min' => '请正确选择三级分类',
            
        ];
    }
}
