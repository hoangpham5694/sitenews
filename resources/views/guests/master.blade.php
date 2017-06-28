<!DOCTYPE html>
<html ng-app="my-app">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<link rel="stylesheet" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo asset('template/vendor/bootstrap/css/bootstrap.min.css') ; ?>" rel="stylesheet">
    <link href="<?php echo asset('template/vendor/font-awesome/css/font-awesome.min.css') ; ?>" rel="stylesheet" type="text/css">
   <link href="<?php echo asset('template/css/guest.css') ; ?>" rel="stylesheet" type="text/css">
       @yield('header')
</head>
<body ng-controller="GuestController">
<div class="container">
	<div id="header">
		<div class="logo">
			<a href="/"></a>
		</div>
		<div class="search-box">
			
        <form action="/tim-kiem.html" method="get" data-ng-init="getListSystems();">
            <input type="text" name="key" id="q" placeholder="Tìm kiếm ứng dụng" x-webkit-speech="">
            <select id="platforms" name="system">
                <option  value="">Tất cả </option>
                <option ng-repeat="system in listSystems" value="{%system.slug%}">{%system.name%} </option>
              
            <input id="btnHeaderFind" type="submit" value="Tìm kiếm">
        </form>
 
   
		</div>
		<div class="clearfix"></div>
	</div>
	<div id="main-nav" class="clearfix">
    <div class="tabs">
    <ul class="navigation clearfix">
        <li class="first home-menu" data-ng-init="getAllCategories();">
            <a href="/">Tất cả</a>
            <ul class="sub-menu">
                <li> <h5>Hệ điều hành</h5></li>
                 <li ng-repeat="system in listSystems" class="item">
                    <a ng-href="/he-dieu-hanh/{%system.slug%}.{%system.id%}"> <span>{%system.name%}</span></a>
                 </li> 
                <li> <h5>Danh mục</h5></li>
                 <li ng-repeat="category in categories" class="item">
                    <a ng-href="/danh-muc/{%category.slug%}.{%category.id%}"> <span>{%category.name%}</span></a>
                 </li> 
            </ul>
        </li>
        <li id="windows" class="item windows">
            <a href="{{url('he-dieu-hanh/windows.2.html')}}">
                <img src="{{asset('images/windows.png')}}">
               <span>Windows</span>
            </a>
                
        </li><li id="mac" class="item mac">
            <a href="{{url('he-dieu-hanh/mac-os.8.html')}}">
                <img src="{{asset('images/mac-os.png')}}">
                <span>Mac</span>
            </a>
                
        </li><li id="android" class="item android">
            <a href="{{url('he-dieu-hanh/android.3.html')}}">
                <img src="{{asset('images/android.png')}}">
                <span>Android</span>
            </a>
               
        </li><li id="ios" class="item ios">
            <a href="{{url('he-dieu-hanh/ios.5.html')}}">
                <img src="{{asset('images/ios.png')}}">
                <span>iOS</span>
            </a>
           
        </li>

        <li id="web" class="item web">
            <a href="{{url('he-dieu-hanh/wep-app.7.html')}}">
                <img src="{{asset('images/globe.png')}}">
                <span>Web Apps</span>
            </a>
              
        </li>


        <li id="docs" class="item docs">
            <a href="">
                <img src="{{asset('images/documentsfolder.png')}}">
                <span>Tài liệu</span>
            </a>
        </li>

     </ul>
    </div>

</div>
<hr>
<div id="main">
@yield('main')
</div>
<div id="footer">
	
</div>
    <script src="<?php echo asset('template/vendor/jquery/jquery.min.js') ; ?>"></script>
    <script src="<?php echo asset('template/vendor/bootstrap/js/bootstrap.min.js') ; ?>"></script>
     <script src="<?php echo asset('template/js/jquery.lazyload.min.js') ; ?>"></script>
    <script src="<?php echo asset('app/lib/angular.min.js') ; ?>"></script>
    <script src="<?php echo asset('app/app.js') ; ?>"></script>   
    <script src="<?php echo asset('app/controller/guests/GuestController.js') ; ?>"></script>  
@yield('footer')

</body>
</html>