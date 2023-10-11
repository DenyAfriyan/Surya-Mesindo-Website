<?php

namespace App\Http\Requests;

use App\Models\ClientPartner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientPartnerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_partner_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'logo' => [
                'required',
            ],
        ];
    }
}
