@extends('guests.mobile.master')
@section('header')

@endsection
@section('main')
<div id="hometopview" data-ng-init="getHighestViewSoftware();">
        <a class="title" href="{{url('/')}}/{%highestViewSoftware.slug%}.{%highestViewSoftware.id%}.html  ">
     {%highestViewSoftware.name%} 
     <i> {%highestViewSoftware.title%} </i>
</a>
        


        <a href="{{url('/')}}/{%highestViewSoftware.slug%}.{%highestViewSoftware.id%}.html ">
            <img ng-src="{{asset('upload/images/128x128')}}/{%highestViewSoftware.image%}" alt="Avast Free Antivirus 2017"></a>
        <div class="publisher-info">
            <span>Phát hành bởi <b>
                <a href="{%highestViewSoftware.publisher_url%}">{%highestViewSoftware.publisher_name%} </a>
            </b></span>
        </div>
            <div class="briefinfo">
               {%highestViewSoftware.description%} 
            </div>
            <div class="clearfix"></div>

            <div class="downloadtimes">
                <label>
                    Lượt tải:
                </label>
                {%highestViewSoftware.downloaded%} 
            </div>
                    <div class="operationsystems">
                <label>
                    Phiên bản:
                </label>
                <span>{%highestViewSoftware.version%} </span>
            </div>
                    <div class="operationsystems">
                <label>
                    Yêu cầu:
                </label>
                <span>{%highestViewSoftware.system_require%}</span>
            </div>
                    <div class="tags" ng-if="highestViewSoftware.tags !=''">
                <label>
                    Tìm thêm:
                </label>


                <a ng-repeat="n in [1,highestViewSoftware.tags.split(',').length] | makeRange"  ng-href="{{url('tim-kiem.html')}}?key={% highestViewSoftware.tags.split(',')[n]%}">  {% highestViewSoftware.tags.split(',')[n]%}</a>



            </div>  
</div>
<div class="tab-softs">
	 <ul class="nav nav-pills nav-justified">
    <li class="active"><a data-toggle="tab" href="#new">Phần mềm mới</a></li>
    <li><a data-toggle="tab" href="#last-update">Mới cập nhật</a></li>
    <li><a data-toggle="tab" href="#menu2">Đưọc đề xuất</a></li>

  </ul>

  <div class="tab-content">
    <div id="new" class="tab-pane fade in active">
    
		<div class="list-softs" data-ng-init="getListNewestSoftwares(0,10,'','');">
			<div class="item clearfix" ng-repeat="software in highestViewSoftwares">
                <h2 class="title">
                    <img ng-src="{{asset('upload/images/32x32')}}/{%software.image%}" alt="{%software.name%}-{%software.title%}">
                    <a class="title" ng-href="{{url('/')}}/{%software.slug%}.{%software.id%}.html"><b>{%software.name%}</b></a> 
                    <i>{%software.title%}</i>
                </h2>
                <div class="item-info">
                  

                    <div class="publisher-info">
                    	<ul>
                    		<li class="publisher-info">
                                <span class="item-label">Phát hành:</span>
                                <a class="item-info" ng-href="{%software.publisher_url%}">
                                    {%software.publisher_name%}
                                </a>
                            </li>
                            <li class="clearfix"></li>
                        <li class="brief-info">
                               {%software.description%}
                        </li>
                    	</ul>
                    </div>
                    <div class="list-item-plus">
                    	<ul class="specs-info">
                    	<li class="download-info">
                    		<a ng-href="{{url('download')}}/{%software.slug%}.{%software.id%}.html" class="download-button">
                    			<span>Tải về</span>
                    		</a>
                    	</li>

                    </ul>
                </div>


                    <div class="clearfix">
                    </div>
                    <ul class="specs-info">

                    	<li class="downloads-info">
                    		<span class="item-label">Lượt tải:</span>
                    		<span class="item-info">{%software.downloaded%}</span>
                    	</li>

                        <li class="version-info">
                      
   <span class="item-label">Version:</span>
                                <span class="item-info">   {%software.version%}</span>
                        </li>


                            <li class="filesize-info">
                                <span class="item-label">Dung lượng:</span>
                                <span class="item-info">   {%software.size%}</span>
                            </li>

                            <li class="requirements-info">
                                <span class="item-label">Yêu cầu:</span>
                                <span class="item-info">{%software.system_require%}</span>
                            </li>
                                <li class="tags" ng-if="software.tags != ''">
                                <span class="item-label">Tìm thêm:</span>
                                <span class="item-info">
                                     <a ng-repeat="n in [1,software.tags.split(',').length] | makeRange"  ng-href="{{url('tim-kiem.html')}}?key={% software.tags.split(',')[n]%}">  {% software.tags.split(',')[n]%}</a>
                                </span>
                            </li>
                    </ul>
                </div>
    
            </div>

		</div>



    </div>
    <div id="last-update" class="tab-pane fade">
     
    <div class="list-softs" data-ng-init="getListLastUpdateSoftwares(0,10,'','');">
            <div class="item clearfix" ng-repeat="software in listLastUpdateSoftwares">
                <h2 class="title">
                    <img ng-src="{{asset('upload/images/32x32')}}/{%software.image%}" alt="{%software.name%}-{%software.title%}">
                    <a class="title" ng-href="{{url('/')}}/{%software.slug%}.{%software.id%}.html"><b>{%software.name%}</b></a> 
                    <i>{%software.title%}</i>
                </h2>
                <div class="item-info">
                  
                    <div class="publisher-info">
                        <ul>
                            <li class="publisher-info">
                                <span class="item-label">Phát hành:</span>
                                <a class="item-info" href="{%software.publisher_url%}">
                                    {%software.publisher_name%}
                                </a>
                            </li>
                            <li class="clearfix"></li>
                        <li class="brief-info">
                               {%software.description%}
                        </li>
                        </ul>
                    </div>
                    <div class="list-item-plus">
                        <ul class="specs-info">
                        <li class="download-info">
                            <a href="{{url('download')}}/{%software.slug%}.{%software.id%}.html" class="download-button">
                                <span>Tải về</span>
                            </a>
                        </li>

                    </ul>
                </div>


                    <div class="clearfix">
                    </div>
                    <ul class="specs-info">

                        <li class="downloads-info">
                            <span class="item-label">Lượt tải:</span>
                            <span class="item-info">{%software.downloaded%}</span>
                        </li>

                        <li class="version-info">
                      
   <span class="item-label">Version:</span>
                                <span class="item-info">   {%software.version%}</span>
                        </li>


                            <li class="filesize-info">
                                <span class="item-label">Dung lượng:</span>
                                <span class="item-info">   {%software.size%}</span>
                            </li>

                            <li class="requirements-info">
                                <span class="item-label">Yêu cầu:</span>
                                <span class="item-info">{%software.system_require%}</span>
                            </li>
                            <li class="tags" ng-if="software.tags != ''">
                                <span class="item-label">Tìm thêm:</span>
                                <span class="item-info">
                                     <a ng-repeat="n in [1,software.tags.split(',').length] | makeRange"  ng-href="">  {% software.tags.split(',')[n]%}</a>
                                </span>
                            </li>
                    </ul>
                </div>
    
            </div>

        </div>






    </div>
    <div id="menu2" class="tab-pane fade">
    
    <div class="list-softs" data-ng-init="getListRandomSoftwares(10,'','');">
            <div class="item clearfix" ng-repeat="software in listRandomSoftwares">
                <h2 class="title">
                    <img ng-src="{{asset('upload/images/32x32')}}/{%software.image%}" alt="{%software.name%}-{%software.title%}">
                    <a class="title" ng-href="{{url('/')}}/{%software.slug%}.{%software.id%}.html"><b>{%software.name%}</b></a> 
                    <i>{%software.title%}</i>
                </h2>
                <div class="item-info">
                 

                    <div class="publisher-info">
                        <ul>
                            <li class="publisher-info">
                                <span class="item-label">Phát hành:</span>
                                <a class="item-info" href="">
                                    {%software.publisher_name%}
                                </a>
                            </li>
                            <li class="clearfix"></li>
                        <li class="brief-info">
                               {%software.description%}
                        </li>
                        </ul>
                    </div>
                    <div class="list-item-plus">
                        <ul class="specs-info">
                        <li class="download-info">
                            <a href="{{url('download')}}/{%software.slug%}.{%software.id%}.html" class="download-button">
                                <span>Tải về</span>
                            </a>
                        </li>

                    </ul>
                </div>


                    <div class="clearfix">
                    </div>
                    <ul class="specs-info">

                        <li class="downloads-info">
                            <span class="item-label">Lượt tải:</span>
                            <span class="item-info">{%software.downloaded%}</span>
                        </li>

                        <li class="version-info">
                      
   <span class="item-label">Version:</span>
                                <span class="item-info">   {%software.version%}</span>
                        </li>


                            <li class="filesize-info">
                                <span class="item-label">Dung lượng:</span>
                                <span class="item-info">   {%software.size%}</span>
                            </li>

                            <li class="requirements-info">
                                <span class="item-label">Yêu cầu:</span>
                                <span class="item-info">{%software.system_require%}</span>
                            </li>
                            <li class="tags" ng-if="software.tags != ''">
                                <span class="item-label">Tìm thêm:</span>
                                <span class="item-info">
                                     <a ng-repeat="n in [1,highestViewSoftware.tags.split(',').length] | makeRange"  href="">  {% software.tags.split(',')[n]%}</a>
                                </span>
                            </li>
                    </ul>
                </div>
    
            </div>

        </div>






    </div>

  </div>

</div>


@endsection
@section('footer')
<script src="<?php echo asset('template/vendor/bootstrap/js/bootstrap.min.js') ; ?>"></script>
@endsection
