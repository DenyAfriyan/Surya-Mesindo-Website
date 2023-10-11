@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.otherContent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.other-contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.otherContent.fields.id') }}
                        </th>
                        <td>
                            {{ $otherContent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherContent.fields.title') }}
                        </th>
                        <td>
                            {{ $otherContent->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherContent.fields.short_description') }}
                        </th>
                        <td>
                            {{ $otherContent->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherContent.fields.description') }}
                        </th>
                        <td>
                            {!! $otherContent->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherContent.fields.author') }}
                        </th>
                        <td>
                            {{ $otherContent->author->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherContent.fields.cover') }}
                        </th>
                        <td>
                            @if($otherContent->cover)
                                <a href="{{ $otherContent->cover->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $otherContent->cover->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherContent.fields.category') }}
                        </th>
                        <td>
                            {{ $otherContent->category->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.other-contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection