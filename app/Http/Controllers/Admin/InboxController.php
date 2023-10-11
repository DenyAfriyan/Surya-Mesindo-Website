<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInboxRequest;
use App\Http\Requests\StoreInboxRequest;
use App\Http\Requests\UpdateInboxRequest;
use App\Models\Inbox;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InboxController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('inbox_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Inbox::query()->select(sprintf('%s.*', (new Inbox())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'inbox_show';
                $editGate = 'inbox_edit';
                $deleteGate = 'inbox_delete';
                $crudRoutePart = 'inboxes';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('subject', function ($row) {
                return $row->subject ? $row->subject : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('is_read', function ($row) {
                return $row->is_read ? $row->is_read : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.inboxes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('inbox_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inboxes.create');
    }

    public function store(StoreInboxRequest $request)
    {
        $inbox = Inbox::create($request->all());

        return redirect()->route('admin.inboxes.index');
    }

    public function edit(Inbox $inbox)
    {
        abort_if(Gate::denies('inbox_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inboxes.edit', compact('inbox'));
    }

    public function update(UpdateInboxRequest $request, Inbox $inbox)
    {
        $inbox->update($request->all());

        return redirect()->route('admin.inboxes.index');
    }

    public function show(Inbox $inbox)
    {
        abort_if(Gate::denies('inbox_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inboxes.show', compact('inbox'));
    }

    public function destroy(Inbox $inbox)
    {
        abort_if(Gate::denies('inbox_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inbox->delete();

        return back();
    }

    public function massDestroy(MassDestroyInboxRequest $request)
    {
        $inboxes = Inbox::find(request('ids'));

        foreach ($inboxes as $inbox) {
            $inbox->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
