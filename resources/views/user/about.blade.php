<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/scss/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/scss/skin.css') }}">
    <link rel="icon" type="image/x-icon" href="{{$company->logo->getUrl()}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/script/index.js') }}"></script>

    <style>
        .floating {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .fab-icon {
            margin-top: 16px;
        }
    </style>
</head>

<?php
    $phone = "https://wa.me/".$company->phone."/?text=Hallo Pride Homeschooling";
?>

<body id="wrapper">

    <a href="{{$phone}}" class="floating" target="_blank">
        <i class="fa fa-whatsapp" style="color:white; margin-top:15px"></i>
    </a>
    <!-- HEADER -->
    @include('partials/usermenu')

    <section id="top_banner">
        <div class="banner">
            <div class="inner text-center">
                <h2>About Us</h2>
            </div>
        </div>
        <div class="page_info">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-6">
                        <h4>About</h4>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6" style="text-align:right;">Home<span class="sep"> 	/ </span><span class="current"> About</span></div>
                </div>
            </div>
        </div>

        </div>
    </section>

    <section id="about-page-section-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7 text-align">
                    <div class="section-heading">
                        <h2>Tentang <span>Kita</span></h2>
                    </div>
                    <p>
                        {{$company->about}}
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5">
                    <img height="" width="auto" src="img/iphone62.png" class="attachment-full img-responsive" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="about-page-section-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="section-heading">
                        <h2>Visi</h2>
                        <p class="subheading">{{$company->vision}}</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-align">
                    <div class="section-heading">
                        <h2>Misi</h2>
                        <p class="subheading">{{$company->mission}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team-member">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 xol-md-12 col-sm-12 col-xs-12">
                    <div class="section-heading text-center">
                        <h1>Guru <span>Pride</span></h1>
                        <p class="subheading">Guru-Guru Pride Homeschooling Tangsel yang akan membantu para siswa</p>
                    </div>
                    @foreach($teachers as $item)
                    <div class="wpb_column vc_column_container col-md-3 col-sm-6 col-xs-6 block mybox">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div class="our-team main-info-below-image">
                                    <div class="our-team-inner">
                                        <div class="our-team-image">
                                            <img src="{{$item->photos->getUrl()}}" />
                                            <div class="qodef-circle-animate"></div>
                                            <div class="our-team-position-icon">
                                                <span class="qodef-icon-shortcode circle">
        			                            <i class="qodef-icon-simple-line-icon qodef-icon-element fa fa-cog"></i></span>
                                            </div>
                                            <h6 class="q_team_position">{{$item->jobtitle}}</h6>
                                        </div>
                                        <div class="our-team-info">
                                            <div class="our-team-title-holder">
                                                <h5 class="our-team-name">{{$item->name}}</h5>
                                            </div>
                                            <div class='our-team-text-inner'>
                                                <div class='our-team-description'>
                                                    <p>{{$item->description}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('partials/footer')

</html>

<script>
    (function(){
var i,e,d=document,s="script";i=d.createElement("script");i.async=1;i.charset="UTF-8";
i.src="https://cdn.curator.io/published/edff91eb-e440-4ce9-98d7-3725806fa580.js";
e=d.getElementsByTagName(s)[0];e.parentNode.insertBefore(i, e);
})();
</script>