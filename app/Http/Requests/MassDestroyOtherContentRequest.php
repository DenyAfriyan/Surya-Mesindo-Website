<?php

namespace App\Http\Requests;

use App\Models\OtherContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOtherContentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('other_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:other_contents,id',
        ];
    }
}
