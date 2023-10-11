<?php

namespace App\Http\Requests;

use App\Models\OtherContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOtherContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('other_content_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'short_description' => [
                'string',
                'nullable',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
