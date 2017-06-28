@extends('guests.master-two-col')
@section('header')

@endsection
@section('content')

<h1 class="detail-title">
                <img src="{{asset('upload/images/32x32')}}/{{$software->image}}" class="software-icon">
                <span class="sw-name" itemprop="name" content="Tor Browser Bundle cho Linux">
                   {{$software->name}}
                </span>
           
                                    <i>{{$software->title}}</i>
</h1>
<div class="detail-info">
    <div class="col-sm-4" style="text-align:center">
        <a href="" >  <img src="{{asset('upload/images/128x128')}}/{{$software->image}}" alt=""></a>
      
    </div>
    <div class="col-sm-8">
        <ul>
            <li>
                <span class="item-label">Phát hành:</span>

                <span class="item-info"><a href="{{$software->publisher_url}}">{{$software->publisher_name}}</a></span>
            </li>
               <li>
                <span class="item-label">Version:</span>
                <span class="item-info">{{$software->version}}</span>
            </li>
               <li>
                <span class="item-label">Dung lượng:</span>
                <span class="item-info">{{$software->size}}</span>
            </li>
               <li>
                <span class="item-label">Lượt tải:</span>
                <span class="item-info">{{$software->downloaded}}</span>
            </li>
               <li>
                <span class="item-label">Ngày cập nhật:</span>
                <span class="item-info">
   <?php \Carbon\Carbon::setLocale('vi');?>
                {!! \Carbon\Carbon::createFromTimeStamp(strtotime($software->updated_at))->diffForHumans() !!}</span>
            </li>
               <li>
                <span class="">Yêu cầu hệ thống:</span>
                <span class="item-info">{{$software->system_require}}</span>
            </li>

        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<hr>
<div class="detail-content">
    <h2 class="name">{{$software->name}} - {{$software->title}}</h2>
    <p class="description">
        <strong>
            {{$software->description}}
        </strong>
    </p>
    {!!$software->content!!}
</div>
<hr>
<div class="detail-download">
    <a ng-href="{{url('download')}}/{{$software->slug}}.{{$software->id}}.html" >Tải về</a>
</div>
<hr>
<div class="detail-tags">
    <strong>Tìm thêm:</strong>
    <?php $arrTags = explode(",",$software->tags); ?>
    @foreach($arrTags as $tag)
        <a href="">{{$tag}}</a>
    @endforeach
    
    
</div>
<hr>
<div id="similarsoftwares" class="detail-relatedsoftwares clearfix">
        <h3>
            <span>Có thể bạn quan tâm</span>
        </h3>
        <ul>
        @foreach($suggestSoftwares as $suggestSoftware)
                    <li class="clearfix">
                            <a class="platform-web" title="{{$suggestSoftware->title}}" href="/web/plug-in-seo/download">
                                <img src="{{asset('upload/images/32x32')}}/{{$suggestSoftware->image}}" alt="{{$suggestSoftware->name}}">
                                <span>{{$suggestSoftware->name}}</span>
                                    <i>{{$suggestSoftware->title}}</i>
                                   <em>{{$suggestSoftware->downloaded}} <i>Lượt tải</i></em>
                            </a>
                    </li>
        @endforeach
                

        </ul>
    </div>
@endsection
@section('footer')

@endsection
