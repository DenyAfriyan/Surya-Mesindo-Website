<!DOCTYPE html>
<html lang="en">

<head>
    <<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="title" content="PT Surya Mesindo Abadi">
	<meta name="keywords" content="Automotive, Marine Industries, Shoes/Sandals, Rubber and Sponge Mats, Conveyor Belts, Rubber Extruding, Industrial Hose, etc.">
	<meta name="description" content="PT Surya Mesindo Abadi We are the market leader in Indonesia's rubber industry.">

    <title>Surya Mesindo Abadi</title>
    <!-- Favicons -->
  <link href="{{ asset('mamba/img/logo.png') }}" rel="icon">
  <link href="{{ asset('mamba/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('industrio/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('industrio/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mamba/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('industrio/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('industrio/css/style.css') }}" rel="stylesheet">
	<meta name="keywords" content="PT Surya Mesindo Abadi">
	<meta name="description" content="PT Surya Mesindo Abadi">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row g-0 d-none d-lg-flex">
            <div class="col-lg-6 ps-5 text-start">
                <div class="h-100 d-inline-flex align-items-center text-white">
                    <span>Follow Us:</span>
                    <a class="btn btn-link text-light" target="_blank" href="https://www.instagram.com/suryamesindo_abadi/?hl=en"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 text-end">
                <div class="h-100 topbar-right d-inline-flex align-items-center text-white py-2 px-5">
                    <span class="fs-5 fw-bold me-2"><i class="fa fa-phone-alt me-2"></i>Call Us:</span>
                    <span class="fs-5 fw-bold">021-55910376</span>
                </div>
            </div>
        </div>
    </div>
    
    {{-- navbar  --}}
    @include('user_v2.partials.navbar')

    {{-- Main --}}
    @yield('page')

    {{-- Footer --}}
    @include('user_v2.partials.footer')


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container text-center">
            <p class="mb-2">Copyright &copy; <a class="fw-semi-bold" href="#">PT Surya Mesindo Abadi</a>, All Right Reserved.
            </p>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('industrio/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('industrio/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('industrio/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('industrio/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('industrio/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('mamba/vendor/glightbox/js/glightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('industrio/js/main.js') }}"></script>
</body>

</html>