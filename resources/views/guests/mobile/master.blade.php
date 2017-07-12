<!DOCTYPE html>
<html lang="en" ng-app="my-app">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Goole Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,500" rel="stylesheet"> 

    <!-- Bootstrap -->
    <link href="{{asset('template/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('template/assets/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    
    <!-- Owl carousel -->
    <link href="{{asset('template/assets/css/owl.carousel.css')}}" rel="stylesheet">
     <link href="{{asset('template/assets/css/owl.theme.default.min.css')}}" rel="stylesheet">

    <!-- Off Canvas Menu -->
    <link href="{{asset('template/css/guest-mobile.css')}}" rel="stylesheet">

    <!--Theme CSS -->

    @yield('heading')

  </head>
<body>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=250027698816567";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
   <div class="pollSlider menu-mobile">
    <form class="navbar-form" role="search" method="GET" action="{{url('tim-kiem.html')}}" >
                        <div class="input-group">
                            <input class="form-control" placeholder="Search" name="key" type="text">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
            <ul>
                    
                    <li class="hidden"><a href="#page-top"></a></li>
                      @foreach(\App\Category::get() as $categorys)
                    <li><a class="page-scroll" href="{{url('danh-muc')}}/{{$categorys->slug}}.{{$categorys->id}}.html">{{$categorys->name}}</a></li>
                      @endforeach
            </ul>
        </div>
          <button type="button" id="pollSlider-button" class=" " >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
<div id="main-wrapper">

    <!-- Header Section -->
    <header>
        <div class="container">
            <div class="top_ber">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top_ber_left">
                        
                        </div><!--top_ber_left-->
                    </div><!--col-md-6-->
                    <div class="col-md-6">
                        <div class="top_ber_right">
                            <div class="top-menu">
                                {{-- <ul class="nav navbar-nav">    
                                    <li><a href="#">Login</a></li>
                                    <li><a href="#">Register</a></li>
                                </ul> --}}
                            </div><!--top-menu-->
                        </div><!--top_ber_left-->
                    </div><!--col-md-6-->
                </div><!--row-->
            </div><!--top_ber-->
            
            <div class="header-section">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                        <a  href="{{url('/')}}"><img class="img-responsive" src="{{asset('template/assets/img/logo.png')}}" alt=""></a>
                        </div><!--logo-->
                    </div><!--col-md-3-->
                    
                    <div class="col-md-6">
                 {{--        <div class="header_ad_banner">
                        <a  href="#"><img class="img-responsive" src="template/assets/img/img_ad.jpg" alt=""></a>
                        </div> --}}
                    </div><!--col-md-6-->
                    
                    <div class="col-md-3">
                        <div class="social_icon1">
                                <a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
                                <!--Twitter-->
                                <a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
                                <!--Google +-->
                                <a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a>
                                <!--Linkedin-->
                                <a class="icons-sm li-ic"><i class="fa fa-linkedin"> </i></a> 
                                <!--Pinterest-->
                                <a class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a>
                        </div> <!--social_icon1-->
                    </div><!--col-md-3-->
                </div> <!--row-->   
            </div><!--header-section-->           
        </div><!-- /.container -->   

        <nav class="navbar main-menu navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
              
                </div>
                <div id="navbar" class="collapse navbar-collapse sidebar-offcanvas">
                <ul class="nav navbar-nav">
                    <li class="hidden"><a href="#page-top"></a></li>
                      @foreach(\App\Category::where("main", '1')->get() as $categorys)
                    <li><a class="page-scroll" href="{{url('danh-muc')}}/{{$categorys->slug}}.{{$categorys->id}}.html">{{$categorys->name}}</a></li>
                      @endforeach
                    
                  

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nhiều hơn <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        @foreach(\App\Category::where("main", '0')->get() as $categorys)
                             <li><a href="{{url('danh-muc')}}/{{$categorys->slug}}.{{$categorys->id}}.html">{{$categorys->name}}</a></li>
                        @endforeach
                           

                        </ul>
                    </li>
                </ul>
                <div class="pull-right">
                    <form class="navbar-form" role="search" method="GET" action="{{url('tim-kiem.html')}}" >
                        <div class="input-group">
                            <input class="form-control" placeholder="Search" name="key" type="text">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </nav> 

        <!-- .navbar -->
    </header>

    @yield('content')


    <footer class="footer_section section_wrapper section_wrapper" >
    <div class="footer_top_section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="text_widget footer_widget">
                    <div class="footer_widget_title"><h2>About Sports Mag</h2></div>
                 
                    <div class="footer_widget_content">Collaborativelyadministrate empowered marketsplug-and-play networks. Dynamic procrastinate after.marketsplug-and-play networks. Dynamic procrastinate users after. Dynamic procrastinateafter. marketsplug-and-play networks. Dynamic procrastinate users after...
                    </div>
                    </div><!--text_widget-->
                </div><!--col-xs-3-->

                <div class="col-md-6">
                    <div class="footer_widget">
                        <div class="footer_widget_title"><h2>Discover</h2></div>
                        <div class="footer_menu_item ">
                        <div class="row">
                            <div class="col-sm-4"> 
                                <ul class="nav navbar-nav ">
                                    <li><a href="../navbar/">Baseball</a></li>
                                    <li><a href="../navbar-static-top/">Football</a></li>
                                    <li><a href="./">Cricket</a></li>
                                    <li><a href="../navbar/">Rugbi</a></li>
                                    <li><a href="../navbar/">Hockey</a></li>
                                    <li><a href="../navbar-static-top/">Boxing</a></li>
                                    <li><a href="./">Golf</a></li>
                                    <li><a href="../navbar/">Tennis</a></li>
                                    <li><a href="../navbar/">Horse Racing</a></li>
                                </ul>
                            </div><!--col-sm-4-->
                            <div class="col-sm-4 ">                                             
                                <ul class="nav navbar-nav  ">
                                    <li><a href="../navbar/">Track & Field</a></li>
                                    <li><a href="../navbar-static-top/">MembershipContact us</a></li>
                                    <li><a href="./">Newsletter Alerts</a></li>
                                    <li><a href="../navbar/">Podcast</a></li>
                                    <li><a href="../navbar/">Blog</a></li>
                                    <li><a href="../navbar-static-top/">SMS Subscription</a></li>
                                    <li><a href="./">Advertisement Policy</a></li>
                                    <li><a href="../navbar/">Jobs</a></li>
                                </ul>
                            </div><!--col-sm-4-->
                            <div class="col-sm-4"> 
                                <ul class="nav navbar-nav ">
                                    <li><a href="../navbar/">Report technical issue</a></li>
                                    <li><a href="../navbar-static-top/">Complaints & Corrections</a></li>
                                    <li><a href="./">Terms & Conditions</a></li>
                                    <li><a href="../navbar-static-top/">Privacy Policy</a></li>
                                    <li><a href="./">Cookie Policy</a></li>
                                    <li><a href="../navbar/">Securedrop</a></li>
                                    <li><a href="../navbar/">Archives</a></li>
                                </ul>
                            </div><!--col-sm-4-->
                        </div><!--row-->
                    </div><!--footer_menu_item-->
                    </div><!--footer_widget-->
                </div><!--col-xs-6-->

                <div class="col-md-3">
                    <div class="text_widget footer_widget">
                        <div class="footer_widget_title"><h2>Editor’s Message</h2></div>
                        <img src="template/assets/img/img-author.jpg" />
                        <div class="footer_widget_content">Collaborativelyadministrate empowered marketsplug-and-play networks. Dynamic procrastinate after.marketsplug-and-play networks. Dynamic procrastinate users after. Dynamic procrastinateafter. marketsplug-and-play networks. Dynamic procrastinate users after...</div>
                    </div>
                </div><!--col-xs-3-->
            </div><!--row-->
        </div><!--container-->
    </div><!--footer_top_section-->
    <a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    
    <div class="copyright-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                           
                    </div><!--col-xs-3-->
                    <div class="col-md-6">
                        <div class="copyright">
                        © Copyright 2017 - Blog Tuổi học trò.
                        </div>
                    </div><!--col-xs-6-->
                    <div class="col-md-3">
                   
                    </div><!--col-xs-3-->
                </div><!--row-->
            </div><!--container-->
        </div><!--copyright-section-->
</footer>

</div> <!--main-wrapper-->
  
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('template/assets/js/jquery.min.js')}}"></script>
<script src="<?php echo asset('template/js/jquery.lazyload.min.js') ; ?>"></script>
     <script src="<?php echo asset('template/js/guest-mobile.js') ; ?>"></script>
<!-- Owl carousel -->
<script src="{{asset('template/assets/js/owl.carousel.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('template/assets/js/bootstrap.min.js')}}"></script>

<!-- Theme Script File-->
<script src="{{asset('template/assets/js/script.js')}}"></script> 

<!-- Off Canvas Menu -->


@yield('footer')
<script>
    $(document).ready(function(){
        $("img.lazy").lazyload();
    });
</script>
   
</body>
</html>