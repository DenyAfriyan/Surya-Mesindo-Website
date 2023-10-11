<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCategoryProductRequest;
use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductRequest;
use App\Models\CategoryProduct;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CategoryProductController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('category_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CategoryProduct::query()->select(sprintf('%s.*', (new CategoryProduct())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'category_product_show';
                $editGate = 'category_product_edit';
                $deleteGate = 'category_product_delete';
                $crudRoutePart = 'category-products';

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

        return view('admin.categoryProducts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('category_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryProducts.create');
    }

    public function store(StoreCategoryProductRequest $request)
    {
        $categoryProduct = CategoryProduct::create($request->all());

        return redirect()->route('admin.category-products.index');
    }

    public function edit(CategoryProduct $categoryProduct)
    {
        abort_if(Gate::denies('category_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryProducts.edit', compact('categoryProduct'));
    }

    public function update(UpdateCategoryProductRequest $request, CategoryProduct $categoryProduct)
    {
        $categoryProduct->update($request->all());

        return redirect()->route('admin.category-products.index');
    }

    public function show(CategoryProduct $categoryProduct)
    {
        abort_if(Gate::denies('category_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryProducts.show', compact('categoryProduct'));
    }

    public function destroy(CategoryProduct $categoryProduct)
    {
        abort_if(Gate::denies('category_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryProduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryProductRequest $request)
    {
        $categoryProducts = CategoryProduct::find(request('ids'));

        foreach ($categoryProducts as $categoryProduct) {
            $categoryProduct->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
