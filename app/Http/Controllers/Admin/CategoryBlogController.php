<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCategoryBlogRequest;
use App\Http\Requests\StoreCategoryBlogRequest;
use App\Http\Requests\UpdateCategoryBlogRequest;
use App\Models\CategoryBlog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CategoryBlogController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('category_blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CategoryBlog::query()->select(sprintf('%s.*', (new CategoryBlog())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'category_blog_show';
                $editGate = 'category_blog_edit';
                $deleteGate = 'category_blog_delete';
                $crudRoutePart = 'category-blogs';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('icon', function ($row) {
                return $row->icon ? $row->icon : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.categoryBlogs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('category_blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryBlogs.create');
    }

    public function store(StoreCategoryBlogRequest $request)
    {
        $categoryBlog = CategoryBlog::create($request->all());

        return redirect()->route('admin.category-blogs.index');
    }

    public function edit(CategoryBlog $categoryBlog)
    {
        abort_if(Gate::denies('category_blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryBlogs.edit', compact('categoryBlog'));
    }

    public function update(UpdateCategoryBlogRequest $request, CategoryBlog $categoryBlog)
    {
        $categoryBlog->update($request->all());

        return redirect()->route('admin.category-blogs.index');
    }

    public function show(CategoryBlog $categoryBlog)
    {
        abort_if(Gate::denies('category_blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryBlogs.show', compact('categoryBlog'));
    }

    public function destroy(CategoryBlog $categoryBlog)
    {
        abort_if(Gate::denies('category_blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryBlog->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryBlogRequest $request)
    {
        $categoryBlogs = CategoryBlog::find(request('ids'));

        foreach ($categoryBlogs as $categoryBlog) {
            $categoryBlog->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
