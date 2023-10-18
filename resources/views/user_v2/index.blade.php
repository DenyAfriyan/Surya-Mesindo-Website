@extends('user_v2.layouts.app')
@section('page')
<!-- Carousel Start -->
<div class="container-fluid px-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="w-100" src="{{ $slider->image->url}}" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-start">
                                <p class="fs-5 fw-medium text-primary text-uppercase animated slideInRight">{{ $slider->title ?? '' }}</p>
                                <h1 class="display-1 text-white mb-5 animated slideInRight">{{ $slider->description ?? '' }}</h1>
                                @if ($key == 0)
                                <a href="{{ route('machine') }}" class="btn btn-primary py-3 px-5 animated slideInRight">Explore More</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

@include('user_v2.partials.about_section')
@include('user_v2.partials.whyus_section')

<!-- Video Modal Start -->
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                        allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Our Services</p>
            <h1 class="display-5 mb-4">We Provide Best Product</h1>
        </div>
        <div class="row gy-5 gx-4">
            <div class="col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item">
                    <img class="img-fluid" src="{{ asset('assets/img/crop570-570_img-home-products-lab-use.jpg') }}" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="{{ asset('assets/img/crop570-570_img-home-products-lab-use.jpg') }}" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <hr class="w-25">
                            <h3 class="mb-0">Machine</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            {{-- <p class="text-white mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                lorem sed diam stet diam sed stet.</p> --}}
                        </div>
                    </div>
                    <a class="btn btn-light" href="{{ route('machine') }}">Read More</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <img class="img-fluid" src="{{ asset('assets/img/crop570-570_img-home-products-accessories.jpg') }}" alt="">
                    <div class="service-img">
                        <img class="img-fluid" src="{{ asset('assets/img/crop570-570_img-home-products-accessories.jpg') }}" alt="">
                    </div>
                    <div class="service-detail">
                        <div class="service-title">
                            <hr class="w-25">
                            <h3 class="mb-0">Accessory & Sparepart</h3>
                            <hr class="w-25">
                        </div>
                        <div class="service-text">
                            {{-- <p class="text-white mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos
                                lorem sed diam stet diam sed stet.</p> --}}
                        </div>
                    </div>
                    <a class="btn btn-light" href="{{ route('accesoryproduct') }}">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- Project Start -->
<div class="container-fluid bg-dark pt-5 my-5 px-0">
    <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
        <p class="fw-medium text-uppercase text-primary mb-2">Our Product</p>
        <h1 class="display-5 text-white mb-5">See What We Have New Product</h1>
    </div>
    <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">
        @foreach ($newest_machine as $row)
        <a class="project-item" href="">
            <img class="img-fluid" src="{{ $row->image->url }}" alt="">
            <div class="project-title">
                <h6 class="text-primary fs-7 mb-0">{{ $row->title }}</h6>
            </div>
        </a>
        @endforeach
    </div>
</div>
<!-- Project End -->


{{-- <!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Our Team</p>
            <h1 class="display-5 mb-5">Dedicated Team Members</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <img class="img-fluid" src="img/team-1.jpg" alt="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                            <i class="fa fa-2x fa-share text-white"></i>
                        </div>
                        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                            style="height: 90px;">
                            <h5>Rob Miller</h5>
                            <span class="text-primary">CEO & Founder</span>
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item">
                    <img class="img-fluid" src="img/team-2.jpg" alt="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                            <i class="fa fa-2x fa-share text-white"></i>
                        </div>
                        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                            style="height: 90px;">
                            <h5>Adam Crew</h5>
                            <span class="text-primary">Project Manager</span>
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item">
                    <img class="img-fluid" src="img/team-3.jpg" alt="">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-square bg-primary" style="width: 90px; height: 90px;">
                            <i class="fa fa-2x fa-share text-white"></i>
                        </div>
                        <div class="position-relative overflow-hidden bg-light d-flex flex-column justify-content-center w-100 ps-4"
                            style="height: 90px;">
                            <h5>Peter Farel</h5>
                            <span class="text-primary">Engineer</span>
                            <div class="team-social">
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-dark rounded-circle mx-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End --> --}}


{{-- <!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-5">Client</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid mx-auto mb-5" src="{{ asset('industrio/img/project-6.jpg') }}">
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid mx-auto mb-5" src="{{ asset('industrio/img/project-6.jpg') }}">
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid mx-auto mb-5" src="{{ asset('industrio/img/project-6.jpg') }}">
                </div>
            </div>
            <div class="testimonial-item text-center">
                <div class="testimonial-img position-relative">
                    <img class="img-fluid  mx-auto mb-5" src="{{ asset('industrio/img/project-6.jpg') }}">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End --> --}}
@endsection


    