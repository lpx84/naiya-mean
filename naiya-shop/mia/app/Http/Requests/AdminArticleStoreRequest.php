<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminArticleStoreRequest extends Request
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
            //文章发表验证
			'title' => 'required',
			'content' => 'required',
			'author' => 'required',
			'img' => 'image',
        ];
    }
	
	public function messages()
	{
		return [
			'title.required' => '标题不能为空',
			'content.required' => '内容不能为空',
			'author.required' => '作者不能为空',
			'img.image' => '图片格式为（ jpeg、png、bmp、gif、 或 svg ）'
		];
		
	}
}
