<!-- Navbar Start -->
<nav class="navbar border-bottom shadow-md navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
    <a href="{{ url('/') }}" class="navbar-brand ps-5 me-0">
        <img src="{{ asset('mamba/img/logo.png') }}" style="width : 70px" alt="">
    </a>
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ $title == 'Home' ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="nav-item nav-link  {{ $title == 'About' ? 'active' : '' }}">About</a>
            <a href="{{ route('whyus') }}" class="nav-item nav-link  {{ $title == 'WhyUs' ? 'active' : '' }}">Why Us</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ isset($type) == 'product' ? 'active' : '' }}" data-bs-toggle="dropdown">Our Product</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="{{ route('machine') }}" class="dropdown-item {{ $title == 'Machine' ? 'active' : '' }}">Machine</a>
                    <a href="{{ route('accesoryproduct') }}" class="dropdown-item {{ $title == 'Accessory and Product' ? 'active' : '' }}">Accessory & Sparepart</a>
                </div>
            </div>
            {{-- <a href="contact.html" class="nav-item nav-link">Contact</a> --}}
        </div>
        <a href="{{ route('contact') }}" class="btn btn-primary px-3 d-none d-lg-block">Contact Us</a>
    </div>
</nav>
<!-- Navbar End -->