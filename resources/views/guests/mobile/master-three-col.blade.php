@extends('guests.master')

@section('main')
<div class="col-sm-2 left-slidebar">
	<div class="row">
		<div id="leftNav" >
			<ul id="leftnavigation" class="leftnavigation right">
				<li class="">
					<a class="first"><img src="//i.dowload.vn/data/image/icon/2015/documentsfolder.png"><span>Danh mục</span>
					</a>
				</li>
				<li ng-repeat="category in categories">
					<a href="/danh-muc/{%category.slug%}.{%category.id%}" class="dc-mega">

						<span>{%category.name%}</span>
						<span class="dc-mega-icon"></span>
					</a>

				</li>

			

			</ul>
		</div>

	</div>
</div>
<div class="col-sm-6 center-content">
@yield('content')
</div>
<div class="col-sm-4 right-slidebar">

	<div id="rightsidebar" class="clearfix">


        <div class="row">
        	
				         <div class="bucket topdownloads clearfix" id="topdownloads">
        <div class="title">
            <span>Phần mềm tải nhiều</span>
        </div>
        <ul class="listbox-view clearfix" data-ng-init="getMostDownloadSoftwares(20)">
                <li class="list-item clearfix" ng-repeat="software in mostDownloadSoftwares">
                    <div class="list-item-title">
                        <a class="title" ng-href="{{url('/')}}/{%software.slug%}.{%software.id%}.html" title="{%software.name%}">
                            {%software.name%}
                              
                        </a>
                        <a class="item-image" ng-href="{{url('/')}}/{%software.slug%}.{%software.id%}.html" title="{%software.name%}">
                            <img ng-src="{{asset('upload/images/32x32')}}/{%software.image%}"></a>
                        <span class="item-downloads">45.960</span>
                        <i> {%software.title%}</i>
                           
                    </div>
                </li>

        </ul>
    </div>

        </div>
   




</div>
    </div>
</div>
@endsection
