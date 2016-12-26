<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MerchantGoodsUpdateRequest extends Request
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
            'bid' => 'required|integer',
            'name' => 'required',
            'price' => 'required',
            'nums' => 'required|integer',
            'desc' => 'required',
            'smallImg' => 'image',
        ];
    }
    
    /**
     * 提示信息
     */
    public function messages()
    {
        return [
            'bid.required' => '品牌不能为空',
            'bid.integer' => '品牌值不正确',
            'name.required' => '商品名称不能为空',
            'price.required' => '单价不能为空',
            'nums.required' => '数量不能为空',
            'nums.integer' => '数量值不正确',
            'desc.required' => '商品内容不能为空',
            'smallImg.image' => '封面必须是一张图片',
        ];
    }
}
