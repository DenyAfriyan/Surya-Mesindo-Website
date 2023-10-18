@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Counter
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.counters.update", [$counter->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.service.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $counter->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="counter">Counter</label>
                <input class="form-control {{ $errors->has('counter') ? 'is-invalid' : '' }}" type="number" name="counter" id="counter" value="{{ old('counter', $counter->counter) }}" required>
                @if($errors->has('counter'))
                    <span class="text-danger">{{ $errors->first('counter') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
  
</script>
@endsection