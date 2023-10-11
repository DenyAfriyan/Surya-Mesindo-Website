<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCompanyProfileRequest;
use App\Http\Requests\StoreCompanyProfileRequest;
use App\Http\Requests\UpdateCompanyProfileRequest;
use App\Models\CompanyProfile;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CompanyProfileController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('company_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CompanyProfile::query()->select(sprintf('%s.*', (new CompanyProfile())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'company_profile_show';
                $editGate = 'company_profile_edit';
                $deleteGate = 'company_profile_delete';
                $crudRoutePart = 'company-profiles';

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
            $table->editColumn('about', function ($row) {
                return $row->about ? $row->about : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('fax', function ($row) {
                return $row->fax ? $row->fax : '';
            });
            $table->editColumn('instagram', function ($row) {
                return $row->instagram ? $row->instagram : '';
            });
            $table->editColumn('github', function ($row) {
                return $row->github ? $row->github : '';
            });
            $table->editColumn('linkedin', function ($row) {
                return $row->linkedin ? $row->linkedin : '';
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
            $table->editColumn('latitude', function ($row) {
                return $row->latitude ? $row->latitude : '';
            });
            $table->editColumn('longitude', function ($row) {
                return $row->longitude ? $row->longitude : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'logo']);

            return $table->make(true);
        }

        return view('admin.companyProfiles.index');
    }

    public function create()
    {
        abort_if(Gate::denies('company_profile_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyProfiles.create');
    }

    public function store(StoreCompanyProfileRequest $request)
    {
        $companyProfile = CompanyProfile::create($request->all());

        if ($request->input('logo', false)) {
            $companyProfile->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $companyProfile->id]);
        }

        return redirect()->route('admin.company-profiles.index');
    }

    public function edit(CompanyProfile $companyProfile)
    {
        abort_if(Gate::denies('company_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyProfiles.edit', compact('companyProfile'));
    }

    public function update(UpdateCompanyProfileRequest $request, CompanyProfile $companyProfile)
    {
        $companyProfile->update($request->all());

        if ($request->input('logo', false)) {
            if (!$companyProfile->logo || $request->input('logo') !== $companyProfile->logo->file_name) {
                if ($companyProfile->logo) {
                    $companyProfile->logo->delete();
                }
                $companyProfile->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($companyProfile->logo) {
            $companyProfile->logo->delete();
        }

        return redirect()->route('admin.company-profiles.index');
    }

    public function show(CompanyProfile $companyProfile)
    {
        abort_if(Gate::denies('company_profile_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.companyProfiles.show', compact('companyProfile'));
    }

    public function destroy(CompanyProfile $companyProfile)
    {
        abort_if(Gate::denies('company_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companyProfile->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompanyProfileRequest $request)
    {
        $companyProfiles = CompanyProfile::find(request('ids'));

        foreach ($companyProfiles as $companyProfile) {
            $companyProfile->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('company_profile_create') && Gate::denies('company_profile_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CompanyProfile();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
