<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="row gx-3 h-100">
                    <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                        <img class="img-fluid" src="{{ asset('industrio/img/about-2.jpg') }}">
                    </div>
                    <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid" src="{{ asset('assets/img/img-home-whyus.jpg') }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="fw-medium text-uppercase text-primary mb-2">About Us</p>
                <h1 class="display-5 mb-4">{{ $abouts->title }}</h1>
                <p class="mb-4">{{$abouts->description}}
                </p>
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-shrink-0 bg-primary p-4">
                        <h1 class="text-white">30 + </h1>
                        <h5 class="text-white">Years</h5>
                        <h5 class="text-white">Experience</h5>
                    </div>
                    <div class="ms-4">
                        <p><i class="fa fa-check text-primary me-2"></i>Automotive</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Marine Industries</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Shoes/Sandals</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Rubber Extruding</p> 
                        <p><i class="fa fa-check text-primary me-2"></i>Etc</p>  
                    </div>
                    {{-- <div class="ms-4">
                        <p><i class="fa fa-check text-primary me-2"></i>Conveyor Belts</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Rubber Extruding</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Industrial Hose</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Etc</p>
                    </div> --}}
                </div>
                <div class="row pt-2">
                    <div class="col-sm-7">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mt-3">Email us</p>
                                <h5 class="mb-0">admin@suryamesindo.co.id</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mt-3">Call us</p>
                                <h5 class="mb-0">021-55910376</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-fluid facts my-5 p-5">
    <div class="row g-5">
        @foreach ($counters as $row)
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
            <div class="text-center border p-5">
                <i class="fa fa-{{ $row->icon }} fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">{{ $row->counter ?? '' }}</h1>
                <span class="fs-5 fw-semi-bold text-white">{{ $row->title ?? '' }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Facts End -->