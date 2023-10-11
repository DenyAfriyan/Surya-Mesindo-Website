@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.headerDescription.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.header-descriptions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.headerDescription.fields.id') }}
                        </th>
                        <td>
                            {{ $headerDescription->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headerDescription.fields.title') }}
                        </th>
                        <td>
                            {{ $headerDescription->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headerDescription.fields.description') }}
                        </th>
                        <td>
                            {{ $headerDescription->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headerDescription.fields.icon') }}
                        </th>
                        <td>
                            {{ $headerDescription->icon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.headerDescription.fields.cover') }}
                        </th>
                        <td>
                            @if($headerDescription->cover)
                                <a href="{{ $headerDescription->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $headerDescription->cover->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.header-descriptions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection