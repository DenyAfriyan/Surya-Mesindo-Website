<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCategoryContentRequest;
use App\Http\Requests\StoreCategoryContentRequest;
use App\Http\Requests\UpdateCategoryContentRequest;
use App\Models\CategoryContent;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CategoryContentController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('category_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CategoryContent::query()->select(sprintf('%s.*', (new CategoryContent)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'category_content_show';
                $editGate      = 'category_content_edit';
                $deleteGate    = 'category_content_delete';
                $crudRoutePart = 'category-contents';

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
            $table->editColumn('cover', function ($row) {
                if ($photo = $row->cover) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'cover']);

            return $table->make(true);
        }

        return view('admin.categoryContents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('category_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryContents.create');
    }

    public function store(StoreCategoryContentRequest $request)
    {
        $categoryContent = CategoryContent::create($request->all());

        if ($request->input('cover', false)) {
            $categoryContent->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $categoryContent->id]);
        }

        return redirect()->route('admin.category-contents.index');
    }

    public function edit(CategoryContent $categoryContent)
    {
        abort_if(Gate::denies('category_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryContents.edit', compact('categoryContent'));
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

        return redirect()->route('admin.category-contents.index');
    }

    public function show(CategoryContent $categoryContent)
    {
        abort_if(Gate::denies('category_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryContents.show', compact('categoryContent'));
    }

    public function destroy(CategoryContent $categoryContent)
    {
        abort_if(Gate::denies('category_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryContent->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryContentRequest $request)
    {
        $categoryContents = CategoryContent::find(request('ids'));

        foreach ($categoryContents as $categoryContent) {
            $categoryContent->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('category_content_create') && Gate::denies('category_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CategoryContent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
