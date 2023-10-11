<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCategoryContentRequest;
use App\Http\Requests\UpdateCategoryContentRequest;
use App\Http\Resources\Admin\CategoryContentResource;
use App\Models\CategoryContent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryContentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('category_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoryContentResource(CategoryContent::all());
    }

    public function store(StoreCategoryContentRequest $request)
    {
        $categoryContent = CategoryContent::create($request->all());

        if ($request->input('cover', false)) {
            $categoryContent->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        return (new CategoryContentResource($categoryContent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CategoryContent $categoryContent)
    {
        abort_if(Gate::denies('category_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoryContentResource($categoryContent);
    }

    public function update(UpdateCategoryContentRequest $request, CategoryContent $categoryContent)
    {
        $categoryContent->update($request->all());

        if ($request->input('cover', false)) {
            if (! $categoryContent->cover || $request->input('cover') !== $categoryContent->cover->file_name) {
                if ($categoryContent->cover) {
                    $categoryContent->cover->delete();
                }
                $categoryContent->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
            }
        } elseif ($categoryContent->cover) {
            $categoryContent->cover->delete();
        }

        return (new CategoryContentResource($categoryContent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CategoryContent $categoryContent)
    {
        abort_if(Gate::denies('category_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryContent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
