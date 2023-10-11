@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.inbox.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inboxes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inbox.fields.id') }}
                        </th>
                        <td>
                            {{ $inbox->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inbox.fields.name') }}
                        </th>
                        <td>
                            {{ $inbox->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inbox.fields.phone') }}
                        </th>
                        <td>
                            {{ $inbox->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inbox.fields.email') }}
                        </th>
                        <td>
                            {{ $inbox->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inbox.fields.subject') }}
                        </th>
                        <td>
                            {{ $inbox->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inbox.fields.description') }}
                        </th>
                        <td>
                            {{ $inbox->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inbox.fields.is_read') }}
                        </th>
                        <td>
                            {{ $inbox->is_read }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inboxes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection