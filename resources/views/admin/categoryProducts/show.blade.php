@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categoryProduct.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.category-products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryProduct.fields.id') }}
                        </th>
                        <td>
                            {{ $categoryProduct->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryProduct.fields.title') }}
                        </th>
                        <td>
                            {{ $categoryProduct->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryProduct.fields.description') }}
                        </th>
                        <td>
                            {{ $categoryProduct->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categoryProduct.fields.icon') }}
                        </th>
                        <td>
                            {{ $categoryProduct->icon }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.category-products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection