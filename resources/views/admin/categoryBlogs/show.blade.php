@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categoryBlog.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.category-blogs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryBlog.fields.id') }}
                        </th>
                        <td>
                            {{ $categoryBlog->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryBlog.fields.title') }}
                        </th>
                        <td>
                            {{ $categoryBlog->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryBlog.fields.description') }}
                        </th>
                        <td>
                            {{ $categoryBlog->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryBlog.fields.icon') }}
                        </th>
                        <td>
                            {{ $categoryBlog->icon }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.category-blogs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection