<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Program</title>
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

    <section id="features-page">
        <div class="subsection1">
            <div class="container">
                <div class="section-heading text-center">
                    <h1><span>3 Program Utama</span></h1>
                    <p class="subheading">Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut.</p>
                </div>
                <div class="col sm_12">
                @foreach($main_programs as $item)
                    <div class="col-sm-4 wpb_column block">
                        <div class="wpb_wrapper">
                            <div class="flip">
                                <div class="iconbox iconbox-style icon-color card clearfix">
                                    <div class="face front">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <i class="fa fa-laptop boxicon"></i>
                                                        <h3>{{$item->title}}</h3>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="iconbox-box2 face back">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h3>{{$item->title}}</h3>
                                                        <p>{{$item->short_description}}</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>

        <div class="subsection3" style=" overflow-x:hidden;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 left-section">
                        <div class="subfeature">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h1><span>Kurikulum </span> Pride Tangsel</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 right-section right-background">
                        <div class="subfeature">
                            @foreach($curriculum as $item)
                            <div class="featureblock">
                                <div class="col-md-2 col-xs-2 icon"><i class="fa fa-laptop feature_icon"></i></div>
                                <div class="col-md-10 col-xs-10">
                                    <h4>{{$item->title}}</h4>
                                    <p>{{$item->short_description}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="subsection2">
            <div class="container">
                <div class="col-xs-12 col-sm_12 col-md-12 col-lg-12 left">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 wpb_column">
                        <div class="wpb_wrapper">
                            <h3>Program Unggulan Pride Homeschooling Tangsel</h3>
                            <hr>
                        </div>
                    </div>
                    
                    <div class="col-md-8 col-sm-12 wpb_column block">
                        <div class="wpb_wrapper">
                        @foreach($programs as $item)
                            <div class="iconbox iconbox-style-2 icon-color clearfix">
                                <div class="iconbox-icon">
                                    <i class="fa fa-lightbulb-o sl-layers boxicon"></i>
                                </div>
                                <div class="iconbox-content">
                                    <h4>{{$item->title}}</h4>
                                    <p>{{$item->short_description}}</p>
                                </div>
                            </div>
                            <div class="spacer"></div>
                        @endforeach
                        </div>
                    </div>
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