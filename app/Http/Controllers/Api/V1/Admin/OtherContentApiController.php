<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreOtherContentRequest;
use App\Http\Requests\UpdateOtherContentRequest;
use App\Http\Resources\Admin\OtherContentResource;
use App\Models\OtherContent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OtherContentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('other_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OtherContentResource(OtherContent::with(['author', 'category'])->get());
    }

    public function store(StoreOtherContentRequest $request)
    {
        $otherContent = OtherContent::create($request->all());

        if ($request->input('cover', false)) {
            $otherContent->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        return (new OtherContentResource($otherContent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OtherContent $otherContent)
    {
        abort_if(Gate::denies('other_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OtherContentResource($otherContent->load(['author', 'category']));
    }

    public function update(UpdateOtherContentRequest $request, OtherContent $otherContent)
    {
        $otherContent->update($request->all());

        if ($request->input('cover', false)) {
            if (! $otherContent->cover || $request->input('cover') !== $otherContent->cover->file_name) {
                if ($otherContent->cover) {
                    $otherContent->cover->delete();
                }
                $otherContent->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
            }
        } elseif ($otherContent->cover) {
            $otherContent->cover->delete();
        }

        return (new OtherContentResource($otherContent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OtherContent $otherContent)
    {
        abort_if(Gate::denies('other_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherContent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
