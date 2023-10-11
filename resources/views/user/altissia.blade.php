<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Altissia</title>
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
    $phone = "https://wa.me/".$company->phone."/?text=Saya ingin bertanya terkait Altissia";
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
                <h2>Altissia</h2>
            </div>
        </div>
        <div class="page_info">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-6">
                        <h4>Altissia</h4>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6" style="text-align:right;">Home<span class="sep"> 	/ </span><span class="current"> Altissia</span></div>
                </div>
            </div>
        </div>
    </section>

    <section id="about-page-section-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-heading">
                        <h2>About Altissia</h2>
                        <p class="subheading">Altissia began in 2005 when academics from the Université Catholique de Louvain (UCLouvain) came together to create a tool to help people everywhere understand each other’s languages -- and from there, their cultures, identities, and perspectives. Altissia grew from their rigorous academic expertise and proven learning methods. Our headquarters are still rooted in the university campus in Louvain-La-Neuve, Belgium. From that seed we’ve grown to every continent, teaching 25 languages around the world</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about-page-section-3">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="section-heading">
                        <h2>Language Courses</h2>
                        <p class="subheading">Language Courses
                        Altissia offers language courses in 25 languages on our intuitive digital platform, as well as live classes in 6 languages. Do you want to improve your organization’s international collaboration, expand your range of courses, certify your students, or internationalize your university? We can provide the tools you need.</p>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-align">
                    <div class="section-heading">
                        <h2>Language Tests</h2>
                        <p class="subheading">Altissia’s language assessments give you a reliable, scalable way to evaluate anyone in 29 languages, so you can choose the best candidate, optimize your students’ learning, and track progress.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="slider_btn">
                <a href="{{$phone}}" class="btn btn-primary slide">Send Whatsapp <i class="fa fa-caret-right"></i></a>
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