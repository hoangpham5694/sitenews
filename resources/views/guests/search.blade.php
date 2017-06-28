@extends('guests.master-two-col')
@section('header')

@endsection
@section('content')

<div class="list-options">
                <span id="OrderBy">Tìm kiếm: {{$key}}</span>
             
</div>

<div class="list-softs" >
@foreach($softwares as $software)
  <div class="item clearfix" >
                <h2 class="title">
                    <img src="{{asset('upload/images/32x32')}}/{{$software->image}}" alt="{{$software->name}}-{{$software->title}}">
                    <a class="title" href="{{url('/')}}/{{$software->slug}}.{{$software->id}}.html"><b>{{$software->name}}</b></a> 
                    <i>{{$software->title}}</i>
                </h2>
                <div class="item-info">
                    <a class="item-image" href="{{url('/')}}/{{$software->name}}.{{$software->id}}.html">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" class="lazy" data-original="{{asset('upload/images/96x96')}}/{{$software->image}}" alt="{{$software->name}}-{{$software->title}}">
                    </a>

                    <div class="publisher-info">
                        <ul>
                            <li class="publisher-info">
                                <span class="item-label">Phát hành:</span>
                                <a class="item-info" href="{{$software->publisher_url}}">
                                    {{$software->publisher_name}}
                                </a>
                            </li>
                            <li class="clearfix"></li>
                        <li class="brief-info">
                               {{$software->description}}
                        </li>
                        </ul>
                    </div>
                    <div class="list-item-plus">
                        <ul class="specs-info">
                        <li class="download-info">
                            <a href="{{url('/download')}}/{{$software->slug}}.{{$software->id}}.html" class="download-button">
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
                            <span class="item-info">{{$software->downloaded}}</span>
                        </li>

                        <li class="version-info">
                      
   <span class="item-label">Version:</span>
                                <span class="item-info">   {{$software->version}}</span>
                        </li>


                            <li class="filesize-info">
                                <span class="item-label">Dung lượng:</span>
                                <span class="item-info">  {{$software->size}}</span>
                            </li>

                            <li class="requirements-info">
                                <span class="item-label">Yêu cầu:</span>
                                <span class="item-info">{{$software->system_require}}</span>
                            </li>
                            @if($software->tags != "")
                                                            <li class="tags" >
                                <span class="item-label">Tìm thêm:</span>
                                <span class="item-info">
                                <?php 
                                    $tags =  explode(',',$software->tags);
                                ?>
                                @foreach($tags as $tag)
                                    <a   href="{{url('/tim-kiem.html')}}?key={{$tag}}"> {{$tag}} </a>
                                @endforeach
                                <!--     <a ng-repeat="n in [1,software.tags.split(',').length] | makeRange"  href="">  {% software.tags.split(',')[n]%}</a>
                                -->
                                </span>
                            </li>
                            @endif

                    </ul>
                </div>
    
            </div>

@endforeach

          

</div>

<div class="pagination-container">
<?php 
  //  $totalPages = $total/
//echo $total;
?>
   <a type="button" ng-repeat="n in [1,{{$total}}] | makeRange" ng-href="{{url('tim-kiem.html')}}?key={{$key}}&system={{$system}}&page={%n%}"  class="btn btn-default" ng-disabled="{{$page}} == n">{% n %}</a>


</div>



@endsection
@section('footer')
<script>
    var timeout = setTimeout(function() {
                $("img.lazy").lazyload();
            }, 200);
</script>
@endsection
