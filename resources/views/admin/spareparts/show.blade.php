@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Spareparts
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.spareparts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.id') }}
                        </th>
                        <td>
                            {{ $sparepart->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.title') }}
                        </th>
                        <td>
                            {{ $sparepart->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.description') }}
                        </th>
                        <td>
                            {{ $sparepart->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Image
                        </th>
                        <td>
                            @if($sparepart->image)
                                <a href="{{ $sparepart->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $sparepart->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.spareparts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection