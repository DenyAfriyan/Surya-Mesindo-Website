<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyClientPartnerRequest;
use App\Http\Requests\StoreClientPartnerRequest;
use App\Http\Requests\UpdateClientPartnerRequest;
use App\Models\ClientPartner;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClientPartnerController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('client_partner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ClientPartner::query()->select(sprintf('%s.*', (new ClientPartner())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'client_partner_show';
                $editGate = 'client_partner_edit';
                $deleteGate = 'client_partner_delete';
                $crudRoutePart = 'client-partners';

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
            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('category', function ($row) {
                return $row->category ? ClientPartner::CATEGORY_SELECT[$row->category] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'logo']);

            return $table->make(true);
        }

        return view('admin.clientPartners.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_partner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientPartners.create');
    }

    public function store(StoreClientPartnerRequest $request)
    {
        $clientPartner = ClientPartner::create($request->all());

        if ($request->input('logo', false)) {
            $clientPartner->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $clientPartner->id]);
        }

        return redirect()->route('admin.client-partners.index');
    }

    public function edit(ClientPartner $clientPartner)
    {
        abort_if(Gate::denies('client_partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientPartners.edit', compact('clientPartner'));
    }

    public function update(UpdateClientPartnerRequest $request, ClientPartner $clientPartner)
    {
        $clientPartner->update($request->all());

        if ($request->input('logo', false)) {
            if (!$clientPartner->logo || $request->input('logo') !== $clientPartner->logo->file_name) {
                if ($clientPartner->logo) {
                    $clientPartner->logo->delete();
                }
                $clientPartner->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($clientPartner->logo) {
            $clientPartner->logo->delete();
        }

        return redirect()->route('admin.client-partners.index');
    }

    public function show(ClientPartner $clientPartner)
    {
        abort_if(Gate::denies('client_partner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientPartners.show', compact('clientPartner'));
    }

    public function destroy(ClientPartner $clientPartner)
    {
        abort_if(Gate::denies('client_partner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientPartner->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientPartnerRequest $request)
    {
        $clientPartners = ClientPartner::find(request('ids'));

        foreach ($clientPartners as $clientPartner) {
            $clientPartner->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('client_partner_create') && Gate::denies('client_partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ClientPartner();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
