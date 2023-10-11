@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.companyProfile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.company-profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.id') }}
                        </th>
                        <td>
                            {{ $companyProfile->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.name') }}
                        </th>
                        <td>
                            {{ $companyProfile->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.address') }}
                        </th>
                        <td>
                            {{ $companyProfile->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.phone') }}
                        </th>
                        <td>
                            {{ $companyProfile->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.email') }}
                        </th>
                        <td>
                            {{ $companyProfile->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.fax') }}
                        </th>
                        <td>
                            {{ $companyProfile->fax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.instagram') }}
                        </th>
                        <td>
                            {{ $companyProfile->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.github') }}
                        </th>
                        <td>
                            {{ $companyProfile->github }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.linkedin') }}
                        </th>
                        <td>
                            {{ $companyProfile->linkedin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.logo') }}
                        </th>
                        <td>
                            @if($companyProfile->logo)
                                <a href="{{ $companyProfile->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $companyProfile->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.latitude') }}
                        </th>
                        <td>
                            {{ $companyProfile->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyProfile.fields.longitude') }}
                        </th>
                        <td>
                            {{ $companyProfile->longitude }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.company-profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection