@extends('user_v2.layouts.app')
@section('page')

<div class="container-fluid bg-dark py-2 mb-2 px-0">
  <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
      <p class="fw-medium text-uppercase text-primary mb-2">Our Product</p>
      <h1 class="display-5 text-white mb-5">Machine</h1>
  </div>
</div>
<div class="container py-5">
  <div class="row justify-content-center">
    @foreach(File::glob(public_path('mamba/img/product/machine').'/*') as $path)
    <div class="col-lg-3 col-md-6">
      <div class="card border-0 h-100 text-center">
        <div class="card-body">
          <img src="{{ str_replace(public_path(), '', $path) }}">
          @php
            $filename = basename($path, ".jpg");
          @endphp
          <p class="text-dark fw-bold py-2">{{ $filename }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>


@endsection