<?php

namespace App\Http\Requests;

use App\Models\CategoryContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCategoryContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_content_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
