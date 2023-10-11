<?php

namespace App\Http\Requests;

use App\Models\CompanyProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCompanyProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_profile_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'about' => [
                'string',
                'nullable',
            ],
            'vision' => [
                'string',
                'nullable',
            ],
            'mission' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'fax' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'github' => [
                'string',
                'nullable',
            ],
            'linkedin' => [
                'string',
                'nullable',
            ],
            'latitude' => [
                'string',
                'nullable',
            ],
            'longitude' => [
                'string',
                'nullable',
            ],
        ];
    }
}
