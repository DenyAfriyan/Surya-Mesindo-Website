<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreHeaderDescriptionRequest;
use App\Http\Requests\UpdateHeaderDescriptionRequest;
use App\Http\Resources\Admin\HeaderDescriptionResource;
use App\Models\HeaderDescription;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HeaderDescriptionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('header_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HeaderDescriptionResource(HeaderDescription::all());
    }

    public function store(StoreHeaderDescriptionRequest $request)
    {
        $headerDescription = HeaderDescription::create($request->all());

        if ($request->input('cover', false)) {
            $headerDescription->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        return (new HeaderDescriptionResource($headerDescription))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HeaderDescription $headerDescription)
    {
        abort_if(Gate::denies('header_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HeaderDescriptionResource($headerDescription);
    }

    public function update(UpdateHeaderDescriptionRequest $request, HeaderDescription $headerDescription)
    {
        $headerDescription->update($request->all());

        if ($request->input('cover', false)) {
            if (!$headerDescription->cover || $request->input('cover') !== $headerDescription->cover->file_name) {
                if ($headerDescription->cover) {
                    $headerDescription->cover->delete();
                }
                $headerDescription->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
            }
        } elseif ($headerDescription->cover) {
            $headerDescription->cover->delete();
        }

        return (new HeaderDescriptionResource($headerDescription))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HeaderDescription $headerDescription)
    {
        abort_if(Gate::denies('header_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $headerDescription->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
