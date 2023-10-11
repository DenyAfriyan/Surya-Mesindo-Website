<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductRequest;
use App\Http\Resources\Admin\CategoryProductResource;
use App\Models\CategoryProduct;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryProductApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoryProductResource(CategoryProduct::all());
    }

    public function store(StoreCategoryProductRequest $request)
    {
        $categoryProduct = CategoryProduct::create($request->all());

        return (new CategoryProductResource($categoryProduct))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CategoryProduct $categoryProduct)
    {
        abort_if(Gate::denies('category_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoryProductResource($categoryProduct);
    }

    public function update(UpdateCategoryProductRequest $request, CategoryProduct $categoryProduct)
    {
        $categoryProduct->update($request->all());

        return (new CategoryProductResource($categoryProduct))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CategoryProduct $categoryProduct)
    {
        abort_if(Gate::denies('category_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryProduct->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
