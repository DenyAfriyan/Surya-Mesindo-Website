<?php

namespace App\Http\Requests;

use App\Models\HeaderDescription;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHeaderDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('header_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:header_descriptions,id',
        ];
    }
}
