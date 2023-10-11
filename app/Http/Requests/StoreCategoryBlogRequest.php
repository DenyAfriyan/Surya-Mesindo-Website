<?php

namespace App\Http\Requests;

use App\Models\CategoryBlog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCategoryBlogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_blog_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'icon' => [
                'string',
                'nullable',
            ],
        ];
    }
}
