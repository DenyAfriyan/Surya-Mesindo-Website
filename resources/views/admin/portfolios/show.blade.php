@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.portfolio.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.portfolios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.portfolio.fields.id') }}
                        </th>
                        <td>
                            {{ $portfolio->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.portfolio.fields.title') }}
                        </th>
                        <td>
                            {{ $portfolio->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.portfolio.fields.description') }}
                        </th>
                        <td>
                            {{ $portfolio->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.portfolio.fields.photos') }}
                        </th>
                        <td>
                            @if($portfolio->photos)
                                <a href="{{ $portfolio->photos->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $portfolio->photos->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.portfolio.fields.link') }}
                        </th>
                        <td>
                            {{ $portfolio->link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.portfolios.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection