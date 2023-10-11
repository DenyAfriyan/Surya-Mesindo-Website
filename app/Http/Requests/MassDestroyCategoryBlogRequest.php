<?php

namespace App\Http\Requests;

use App\Models\CategoryBlog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCategoryBlogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('category_blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:category_blogs,id',
        ];
    }
}
