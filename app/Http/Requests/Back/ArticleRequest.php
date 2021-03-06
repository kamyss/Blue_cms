<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|unique:articles',
            'category_id' => 'required',
            'keys' => 'required',
            'intro' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '请填写标题',
            'title.unique' => '标题重复',
            'category_id.required' => '请选择分类',
            'keys.required' => '请填写关键词',
            'content.required' => '请添加文档内容'
        ]; // TODO: Change the autogenerated stub
    }
}
