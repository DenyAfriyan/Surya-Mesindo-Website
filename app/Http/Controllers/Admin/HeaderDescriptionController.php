<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHeaderDescriptionRequest;
use App\Http\Requests\StoreHeaderDescriptionRequest;
use App\Http\Requests\UpdateHeaderDescriptionRequest;
use App\Models\HeaderDescription;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class HeaderDescriptionController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('header_description_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = HeaderDescription::query()->select(sprintf('%s.*', (new HeaderDescription())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'header_description_show';
                $editGate = 'header_description_edit';
                $deleteGate = 'header_description_delete';
                $crudRoutePart = 'header-descriptions';

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

        return view('admin.headerDescriptions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('header_description_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headerDescriptions.create');
    }

    public function store(StoreHeaderDescriptionRequest $request)
    {
        $headerDescription = HeaderDescription::create($request->all());

        if ($request->input('cover', false)) {
            $headerDescription->addMedia(storage_path('tmp/uploads/' . basename($request->input('cover'))))->toMediaCollection('cover');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $headerDescription->id]);
        }

        return redirect()->route('admin.header-descriptions.index');
    }

    public function edit(HeaderDescription $headerDescription)
    {
        abort_if(Gate::denies('header_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headerDescriptions.edit', compact('headerDescription'));
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

        return redirect()->route('admin.header-descriptions.index');
    }

    public function show(HeaderDescription $headerDescription)
    {
        abort_if(Gate::denies('header_description_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.headerDescriptions.show', compact('headerDescription'));
    }

    public function destroy(HeaderDescription $headerDescription)
    {
        abort_if(Gate::denies('header_description_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $headerDescription->delete();

        return back();
    }

    public function massDestroy(MassDestroyHeaderDescriptionRequest $request)
    {
        $headerDescriptions = HeaderDescription::find(request('ids'));

        foreach ($headerDescriptions as $headerDescription) {
            $headerDescription->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('header_description_create') && Gate::denies('header_description_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HeaderDescription();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
