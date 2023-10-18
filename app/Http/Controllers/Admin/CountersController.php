<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreServiceRequest;
use App\Models\Counter;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CountersController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $query = Counter::query()->select(sprintf('%s.*', (new Counter())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'service_show';
                $editGate = 'service_edit';
                $deleteGate = 'service_delete';
                $crudRoutePart = 'counters';

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
            $table->editColumn('counter', function ($row) {
                return $row->counter ? $row->counter : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.counters.index');
    }

    public function create()
    {

        return view('admin.counters.create');
    }

    public function store(Request $request)
    {
       
        $counter = Counter::create($request->all());

        return redirect()->route('admin.counters.index');
    }

    public function edit(Counter $counter)
    {

        return view('admin.counters.edit', compact('counter'));
    }

    public function update(Request $request, Counter $counter)
    {
        $counter->update($request->all());


        return redirect()->route('admin.counters.index');
    }

    public function show(Counter $counter)
    {

        return view('admin.counters.show', compact('counter'));
    }

    public function destroy(Counter $counter)
    {

        $counter->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        $counters = Counter::find(request('ids'));

        foreach ($counters as $counter) {
            $counter->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {

        $model         = new Counter();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
