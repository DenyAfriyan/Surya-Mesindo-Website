<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryBlogRequest;
use App\Http\Requests\UpdateCategoryBlogRequest;
use App\Http\Resources\Admin\CategoryBlogResource;
use App\Models\CategoryBlog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryBlogApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category_blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoryBlogResource(CategoryBlog::all());
    }

    public function store(StoreCategoryBlogRequest $request)
    {
        $categoryBlog = CategoryBlog::create($request->all());

        return (new CategoryBlogResource($categoryBlog))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CategoryBlog $categoryBlog)
    {
        abort_if(Gate::denies('category_blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoryBlogResource($categoryBlog);
    }

    public function update(UpdateCategoryBlogRequest $request, CategoryBlog $categoryBlog)
    {
        $categoryBlog->update($request->all());

        return (new CategoryBlogResource($categoryBlog))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CategoryBlog $categoryBlog)
    {
        abort_if(Gate::denies('category_blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryBlog->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
