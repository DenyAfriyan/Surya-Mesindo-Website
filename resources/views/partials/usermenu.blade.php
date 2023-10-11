<section id="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7 col-xs-7 top-header-links">
                <ul class="contact_links">
                    <li><i class="fa fa-phone"></i><a href="#">{{$company->phone}}</a></li>
                    <li><i class="fa fa-envelope"></i><a href="#">{{$company->email}}</a></li>
                </ul>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-5 social">
                <ul class="social_links">
                    <li><a href="{{$company->instagram}}"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="{{$company->github}}"><i class="fa fa-github"></i></a></li>
                    <li><a href="{{$company->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>

<header>
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <!-- <h1>Aspire</h1><span>Software Solutions</span> -->
                        <img src="{{$company->logo->getUrl()}}" class="navbar-brand">
                    </a>
                </div>
                <div id="navbar" class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="{{ last(request()->segments()) == '' ? 'active' : '' }}"><a href="{{route('home')}}">Home</a></li>
                        <li class="{{ last(request()->segments()) == 'about' ? 'active' : '' }}"><a href="{{route('about')}}">Tentang</a></li>
                        <li class="{{ last(request()->segments()) == 'program' ? 'active' : '' }}"><a href="{{route('program')}}">Program</a></li>
                        <li class="{{ last(request()->segments()) == 'alumni' ? 'active' : '' }}"><a href="{{route('alumni')}}">Alumni</a></li>
                        <li class="{{ last(request()->segments()) == 'blog' || strpos($_SERVER['REQUEST_URI'], 'detailblog') !== false ? 'active' : '' }}"><a href="{{route('blog')}}">Blog</a></li>
                        <li class="{{ last(request()->segments()) == 'contact' ? 'active' : '' }}"><a href="{{route('contact')}}">Kontak</a></li>
                        <?php
                            $altissia = "https://wa.me/628561454140/?text=Hallo Pride Home Schooling, saya ingin menanyakan terkait Altissia Program";
                        ?>
                        <li class="{{ last(request()->segments()) == 'altissia' ? 'active' : '' }}"><a href="{{route('altissia')}}">Altissia Program</a></li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </nav>
</header>