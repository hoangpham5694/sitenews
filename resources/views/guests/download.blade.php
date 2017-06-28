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
<div class="detail-link">
    <h2>Tải về</h2>
    @if($software->direct_link != "")
        <a href="{{$software->direct_link}}">Đường dẫn chính</a> <br>
    @endif
    @if($software->mirror_link1 != "")
        <a href="{{$software->mirror_link1}}">Đương dẫn dự phòng 1</a><br>
    @endif
    
    @if($software->mirror_link2 != "")
            <a href="{{$software->mirror_link2}}">Đưòng dẫn dự phòng 2</a><br>
    @endif
    
    @if($software->crack != "")
         <a href="{{$software->crack}}">Crack</a>
    @endif
    
   

   
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
