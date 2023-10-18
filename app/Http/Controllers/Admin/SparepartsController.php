<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Sparepart;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SparepartsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = Sparepart::query()->select(sprintf('%s.*', (new Sparepart())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'service_show';
                $editGate = 'service_edit';
                $deleteGate = 'service_delete';
                $crudRoutePart = 'spareparts';

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
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image']);

            return $table->make(true);
        }

        return view('admin.spareparts.index');
    }

    public function create()
    {

        return view('admin.spareparts.create');
    }

    public function store(Request $request)
    {
       
        $sparepart = Sparepart::create($request->all());

        if ($request->input('image', false)) {
            $sparepart->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
    
            Media::whereIn('id', $media)->update(['model_id' => $sparepart->id]);
        }

        return redirect()->route('admin.spareparts.index');
    }

    public function edit(Sparepart $sparepart)
    {

        return view('admin.spareparts.edit', compact('sparepart'));
    }

    public function update(Request $request, Sparepart $sparepart)
    {
        $sparepart->update($request->all());

        if ($request->input('image', false)) {
            if (!$sparepart->image || $request->input('image') !== $sparepart->image->file_name) {
                if ($sparepart->image) {
                    $sparepart->image->delete();
                }
                $sparepart->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($sparepart->image) {
            $sparepart->image->delete();
        }

        return redirect()->route('admin.spareparts.index');
    }

    public function show(Sparepart $sparepart)
    {

        return view('admin.spareparts.show', compact('sparepart'));
    }

    public function destroy(Sparepart $sparepart)
    {

        $sparepart->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        $spareparts = Sparepart::find(request('ids'));

        foreach ($spareparts as $sparepart) {
            $sparepart->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {

        $model         = new Sparepart();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
