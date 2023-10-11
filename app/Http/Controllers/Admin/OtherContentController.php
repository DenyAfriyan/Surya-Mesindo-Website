<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOtherContentRequest;
use App\Http\Requests\StoreOtherContentRequest;
use App\Http\Requests\UpdateOtherContentRequest;
use App\Models\CategoryContent;
use App\Models\OtherContent;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OtherContentController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('other_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OtherContent::with(['author', 'category'])->select(sprintf('%s.*', (new OtherContent)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'other_content_show';
                $editGate      = 'other_content_edit';
                $deleteGate    = 'other_content_delete';
                $crudRoutePart = 'other-contents';

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
            $table->editColumn('short_description', function ($row) {
                return $row->short_description ? $row->short_description : '';
            });
            $table->addColumn('author_name', function ($row) {
                return $row->author ? $row->author->name : '';
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
            $table->addColumn('category_title', function ($row) {
                return $row->category ? $row->category->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'author', 'cover', 'category']);

            return $table->make(true);
        }

        return view('admin.otherContents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('other_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = CategoryContent::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.otherContents.create', compact('authors', 'categories'));
    }

    public function store(StoreOtherContentRequest $request)
    {
        $otherContent = OtherContent::create($request->all());

        if ($request->input('cover', false)) {
            $otherContent->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $otherContent->id]);
        }

        return redirect()->route('admin.other-contents.index');
    }

    public function edit(OtherContent $otherContent)
    {
        abort_if(Gate::denies('other_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = CategoryContent::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $otherContent->load('author', 'category');

        return view('admin.otherContents.edit', compact('authors', 'categories', 'otherContent'));
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

        return redirect()->route('admin.other-contents.index');
    }

    public function show(OtherContent $otherContent)
    {
        abort_if(Gate::denies('other_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherContent->load('author', 'category');

        return view('admin.otherContents.show', compact('otherContent'));
    }

    public function destroy(OtherContent $otherContent)
    {
        abort_if(Gate::denies('other_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $otherContent->delete();

        return back();
    }

    public function massDestroy(MassDestroyOtherContentRequest $request)
    {
        $otherContents = OtherContent::find(request('ids'));

        foreach ($otherContents as $otherContent) {
            $otherContent->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('other_content_create') && Gate::denies('other_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new OtherContent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
