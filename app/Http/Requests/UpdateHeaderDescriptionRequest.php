<?php

namespace App\Http\Requests;

use App\Models\HeaderDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHeaderDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('header_description_edit');
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
