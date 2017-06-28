@extends('guests.mobile.master')
@section('header')

@endsection
@section('main')

<div class="list-options">
                <span id="OrderBy">{{$cate->name}}:</span>
                <a href="" ng-click="getListSoftwaresWithCate(1,{{$cate->id}},'id');" ng-class="{selected: order=='id'}">Mới nhất</a>
                <a href=""  ng-click="getListSoftwaresWithCate(1,{{$cate->id}},'downloaded');" ng-class="{selected: order=='downloaded'}"> Tải nhiều nhất</a>
                <div class="clearfix"></div>
</div>

            <div class="list-softs" data-ng-init="getListSoftwaresWithCate(1,{{$cate->id}},'downloaded');">
            <div class="item clearfix" ng-repeat="software in listSoftwaresWithCate">
                <h2 class="title">
                    <img ng-src="{{asset('upload/images/32x32')}}/{%software.image%}" alt="{%software.name%}-{%software.title%}">
                    <a class="title" ng-href="{{url('/')}}/{%software.slug%}.{%software.id%}.html"><b>{%software.name%}</b></a> 
                    <i>{%software.title%}</i>
                </h2>
                <div class="item-info">
                    <a class="item-image" ng-href="{{url('/')}}/{%software.slug%}.{%software.id%}.html">
                        <img ng-src="{{asset('upload/images/96x96')}}/{%software.image%}" alt="{%software.name%}-{%software.title%}">
                    </a>

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
                                                    <li class="tags">
                                <span class="item-label">Tìm thêm:</span>
                                <span class="item-info">
                                     <a ng-repeat="n in [1,software.tags.split(',').length] | makeRange"  href="">  {% software.tags.split(',')[n]%}</a>
                                </span>
                            </li>
                    </ul>
                </div>
    
            </div>

        </div>

<div class="pagination-container">

   <button type="button" ng-repeat="n in [1,totalSoftwareWithCate] | makeRange" ng-click="getListSoftwaresWithCate(n,{{$cate->id}},order)"  class="btn btn-default" ng-disabled="pageListSoftwaresWithCate == n">{% n %}</button>


</div>



@endsection
@section('footer')

@endsection
