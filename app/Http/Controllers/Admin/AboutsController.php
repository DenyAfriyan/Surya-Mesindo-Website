<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreServiceRequest;
use App\Models\About;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AboutsController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = About::query()->select(sprintf('%s.*', (new About())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'service_show';
                $editGate = 'service_edit';
                $deleteGate = 'service_delete';
                $crudRoutePart = 'abouts';

                return view('partials.datatablesActionsNoDelete', compact(
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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.abouts.index');
    }

    public function create()
    {

        return view('admin.abouts.create');
    }

    public function store(Request $request)
    {
       
        $about = About::create($request->all());

        return redirect()->route('admin.abouts.index');
    }

    public function edit(About $about)
    {

        return view('admin.abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $about->update($request->all());


        return redirect()->route('admin.abouts.index');
    }

    public function show(About $about)
    {

        return view('admin.abouts.show', compact('about'));
    }

    public function destroy(About $about)
    {

        $about->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        $abouts = About::find(request('ids'));

        foreach ($abouts as $about) {
            $about->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {

        $model         = new About();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
