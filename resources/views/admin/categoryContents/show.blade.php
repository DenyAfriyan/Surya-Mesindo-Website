@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categoryContent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.category-contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryContent.fields.id') }}
                        </th>
                        <td>
                            {{ $categoryContent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryContent.fields.title') }}
                        </th>
                        <td>
                            {{ $categoryContent->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryContent.fields.description') }}
                        </th>
                        <td>
                            {{ $categoryContent->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryContent.fields.cover') }}
                        </th>
                        <td>
                            @if($categoryContent->cover)
                                <a href="{{ $categoryContent->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $categoryContent->cover->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.category-contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection