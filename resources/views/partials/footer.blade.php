<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12 block">
                <div class="footer-block">
                    <h4>{{$company->name}}</h4>
                    <hr/>
                    <p>{{$company->about}}</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 block">
                <div class="footer-block">
                    <h4>Useful Links</h4>
                    <hr/>
                    <ul class="footer-links">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('about')}}">Tentang</a></li>
                        <li><a href="{{route('program')}}">Program</a></li>
                        <li><a href="{{route('blog')}}">Blog</a></li>
                        <li><a href="{{route('contact')}}">Kontak</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 block">
                <div class="footer-block">
                    <h4>Address</h4>
                    <hr/>
                    <ul class="footer-links">
                        <li>{{$company->address}}</li>
                    </ul>
                    <div class="col-md-5 col-sm-5 col-xs-5 social">
                        <ul class="social_links">
                            <li><a href="{{$company->instagram}}"><i class="fa fa-instagram"></i> Instagram</a></li>
                            <li><a href="{{$company->github}}"><i class="fa fa-github"></i> Github</a></li>
                            <li><a href="{{$company->linkedin}}"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="bottom-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 btm-footer-links">
                <!-- <a href="#">Privacy Policy</a>
                <a href="#">Terms of Use</a> -->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 copyright">
                Developed by <a href="https://nebulakreatif.com/">Nebula Kreatif Digital Studio</a>
            </div>
        </div>
    </div>
</section>

<div id="panel">
    <div id="panel-admin">
        <div class="panel-admin-box">
            <div id="tootlbar_colors">
                <button class="color" style="background-color:#e54e53;" onclick="mytheme(0)"></button>
                <button class="color" style="background-color:#ff8a00;" onclick="mytheme(1)"> </button>
                <button class="color" style="background-color:#b4de50;" onclick="mytheme(2)"> </button>
                <button class="color" style="background-color:#1abac8;" onclick="mytheme(3)"> </button>
                <button class="color" style="background-color:#1abc9c;" onclick="mytheme(4)"> </button>
                <button class="color" style="background-color:#159eee;" onclick="mytheme(5)"> </button>
            </div>
        </div>
    </div>

    <!-- <a class="open" href="#"><span><i class="fa fa-gear fa-spin"></i></span></a> -->
</div>