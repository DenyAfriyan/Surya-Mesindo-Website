<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCompanyProfileRequest;
use App\Http\Requests\UpdateCompanyProfileRequest;
use App\Http\Resources\Admin\CompanyProfileResource;
use App\Models\CompanyProfile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyProfileApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('company_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyProfileResource(CompanyProfile::all());
    }

    public function store(StoreCompanyProfileRequest $request)
    {
        $companyProfile = CompanyProfile::create($request->all());

        if ($request->input('logo', false)) {
            $companyProfile->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        return (new CompanyProfileResource($companyProfile))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CompanyProfile $companyProfile)
    {
        abort_if(Gate::denies('company_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompanyProfileResource($companyProfile);
    }

    public function update(UpdateCompanyProfileRequest $request, CompanyProfile $companyProfile)
    {
        $companyProfile->update($request->all());

        if ($request->input('logo', false)) {
            if (!$companyProfile->logo || $request->input('logo') !== $companyProfile->logo->file_name) {
                if ($companyProfile->logo) {
                    $companyProfile->logo->delete();
                }
                $companyProfile->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($companyProfile->logo) {
            $companyProfile->logo->delete();
        }

        return (new CompanyProfileResource($companyProfile))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CompanyProfile $companyProfile)
    {
        abort_if(Gate::denies('company_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyProfile->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
