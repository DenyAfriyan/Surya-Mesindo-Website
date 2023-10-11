<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreClientPartnerRequest;
use App\Http\Requests\UpdateClientPartnerRequest;
use App\Http\Resources\Admin\ClientPartnerResource;
use App\Models\ClientPartner;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientPartnerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('client_partner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientPartnerResource(ClientPartner::all());
    }

    public function store(StoreClientPartnerRequest $request)
    {
        $clientPartner = ClientPartner::create($request->all());

        if ($request->input('logo', false)) {
            $clientPartner->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        return (new ClientPartnerResource($clientPartner))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ClientPartner $clientPartner)
    {
        abort_if(Gate::denies('client_partner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientPartnerResource($clientPartner);
    }

    public function update(UpdateClientPartnerRequest $request, ClientPartner $clientPartner)
    {
        $clientPartner->update($request->all());

        if ($request->input('logo', false)) {
            if (!$clientPartner->logo || $request->input('logo') !== $clientPartner->logo->file_name) {
                if ($clientPartner->logo) {
                    $clientPartner->logo->delete();
                }
                $clientPartner->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($clientPartner->logo) {
            $clientPartner->logo->delete();
        }

        return (new ClientPartnerResource($clientPartner))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ClientPartner $clientPartner)
    {
        abort_if(Gate::denies('client_partner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientPartner->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
