@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clientPartner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-partners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clientPartner.fields.id') }}
                        </th>
                        <td>
                            {{ $clientPartner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientPartner.fields.title') }}
                        </th>
                        <td>
                            {{ $clientPartner->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientPartner.fields.logo') }}
                        </th>
                        <td>
                            @if($clientPartner->logo)
                                <a href="{{ $clientPartner->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $clientPartner->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientPartner.fields.description') }}
                        </th>
                        <td>
                            {{ $clientPartner->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientPartner.fields.category') }}
                        </th>
                        <td>
                            {{ App\Models\ClientPartner::CATEGORY_SELECT[$clientPartner->category] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-partners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection