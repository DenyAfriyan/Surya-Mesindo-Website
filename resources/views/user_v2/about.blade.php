@extends('user_v2.layouts.app')
@section('page')
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
                <h1 class="display-5 mb-4">Rubber Manufacturing Machinery Provider In Indonesia</h1>
                <p class="mb-4">PT Surya Mesindo Abadi Is A Rubber Manufacturing Machinery Provider In Indonesia For Over Two Decades.
                    We specialize in supplying production line
                </p>
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-shrink-0 bg-primary p-4">
                        <h1 class="text-white">20 + </h1>
                        <h5 class="text-white">Years</h5>
                        <h5 class="text-white">Experience</h5>
                    </div>
                    <div class="ms-4">
                        <p><i class="fa fa-check text-primary me-2"></i>Automotive</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Marine Industries</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Shoes/Sandals</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Rubber and Sponge Mats</p>  
                    </div>
                    <div class="ms-4">
                        <p><i class="fa fa-check text-primary me-2"></i>Conveyor Belts</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Rubber Extruding</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Industrial Hose</p>
                        <p><i class="fa fa-check text-primary me-2"></i>Etc</p>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-envelope-open text-white"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Email us</p>
                                <h5 class="mb-0">admin@suryamesindo.co.id</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <p class="mb-2">Call us</p>
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
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
            <div class="text-center border p-5">
                <i class="fa fa-certificate fa-3x text-white mb-3"></i>
                <h1 class=""></h1>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">20</h1>
                <span class="fs-5 fw-semi-bold text-white">Years Work Experience
                </span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
            <div class="text-center border p-5">
                <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">135</h1>
                <span class="fs-5 fw-semi-bold text-white">Engineer</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
            <div class="text-center border p-5">
                <i class="fa fa-users fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">957</h1>
                <span class="fs-5 fw-semi-bold text-white">Clients</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
            <div class="text-center border p-5">
                <i class="fa fa-check-double fa-3x text-white mb-3"></i>
                <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">1839</h1>
                <span class="fs-5 fw-semi-bold text-white">Product</span>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->
@endsection