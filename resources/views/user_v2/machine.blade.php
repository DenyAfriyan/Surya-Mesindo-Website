@extends('user_v2.layouts.app')
@section('page')

<div class="container-fluid bg-dark py-2 mb-2 px-0">
  <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
      <p class="fw-medium text-uppercase text-primary mb-2">Our Product</p>
      <h1 class="display-5 text-white mb-5">Machine</h1>
  </div>
</div>
<div class="container py-5">
  <div class="row justify-content-center gy-3">
    @foreach ($machines as $machine)
    <div class="col-lg-3 col-md-6">
      <div class="card border-0 h-100 text-center bg-secondary" style="border-radius: 15px">
        <img class="card-img-top" src="{{ $machine->image->url }}" style="border-top-left-radius: 15px;border-top-right-radius: 15px">
        <div class="card-body align-items-center d-flex justify-content-center">
          <p class="text-primary fw-bold py-2">{{ $machine->title }}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>


@endsection