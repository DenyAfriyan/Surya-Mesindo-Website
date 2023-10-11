<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
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
        <div class="banner" style="background-image: linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(0, 0, 0, 0.83)), url('{{$blog->cover->getUrl()}}')">
            <div class="inner text-center">
                <h2>{{$blog->title}}</h2>
                <p class="subheading" style="color:white">{{$blog->author->name . " | " . date("d-m-Y", strtotime($blog->created_at))}}</p>
            </div>
        </div>
        <div class="page_info">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-6">
                        <h4>Blog</h4>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6" style="text-align:right;">Home<span class="sep"> 	/ </span><span class="current"> {{$blog->title}}</span></div>
                </div>
            </div>
        </div>

        </div>
    </section>

    <section id="portfolio">
        <div class="container">
            <div class="row" id="content">
            </div>
        </div>



    </section>

    @include('partials/footer')

</html>

<script>
    var content = '{{$blog->description}}';
    var contenthtml = content.replace(/&lt;/g, '<').replace(/&gt;/g, '>');
    $("#content").html(contenthtml).text(); 
</script>