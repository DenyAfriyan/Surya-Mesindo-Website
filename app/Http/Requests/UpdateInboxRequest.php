<?php

namespace App\Http\Requests;

use App\Models\Inbox;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInboxRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inbox_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'subject' => [
                'string',
                'nullable',
            ],
            'description' => [
                'required',
            ],
            'is_read' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
