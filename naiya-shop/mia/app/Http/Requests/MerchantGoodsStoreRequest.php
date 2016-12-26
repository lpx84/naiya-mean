<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MerchantGoodsStoreRequest extends Request
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
            'cid' => 'required|integer',
            'bid' => 'required|integer',
            'code' => 'required',
            'name' => 'required',
            'price' => 'required',
            'nums' => 'required|integer',
            'desc' => 'required',
            'imgs' => 'required',
            'smallImg' => 'required|image',
        ];
    }
    
    /**
     * 提示信息
     */
    public function messages()
    {
        return [
            'cid.required' => '分类不能为空',
            'cid.integer' => '分类值不正确',
            'bid.required' => '品牌不能为空',
            'bid.integer' => '品牌值不正确',
            'code.required' => '商品编号不能为空',
            'name.required' => '商品名称不能为空',
            'price.required' => '单价不能为空',
            'nums.required' => '数量不能为空',
            'nums.integer' => '数量值不正确',
            'desc.required' => '商品内容不能为空',
            'imgs.required' => '配图不能为空',
            'smallImg.required' => '封面图不能为空',
            'smallImg.image' => '封面必须是一张图片',
        ];
    }
}
