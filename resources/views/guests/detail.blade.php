@extends('guests.master')
@section('heading')
<title> {!!$post->title!!}&nbsp - &nbsp{{getenvconf('SiteDomain')}}</title>
<meta id="metaDescription" name="description" content="{{$post->description}}" />
<meta id="metaKeywords" name="keywords" content="{{$post->title}}" />
<meta name="author" content="{{getenvconf('SiteDomain')}}" />


<meta name="googlebot" content="noarchive" />
<meta name="robots" content="noarchive" />
<!-- GOOGLE SEARCH STRUCTURED DATA FOR ARTICLE -->
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "NewsArticle",
"mainEntityOfPage":{
"@type":"WebPage",
"@id":"{{url('/')}}/{{$post->cate_slug}}/{{$post->post_slug}}.{{$post->id}}.html"
},
"headline": "{{$post->title}}",
"description": "{{$post->description}}",
"image": {
"@type": "ImageObject",
"url": "{{asset('upload/images/posts/')}}/{{getenvconf('HorizontalImageWidth').'x'.getenvconf('HorizontalImageHeight')}}/{{$post->image}}",
"width" : {{getenvconf('HorizontalImageWidth')}},
"height" : {{getenvconf('HorizontalImageHeight')}}
},
"datePublished": "{!! \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->toW3cString() !!}",
"dateModified": "{!! \Carbon\Carbon::createFromTimeStamp(strtotime($post->updated_at))->toW3cString() !!}",
"author": {
"@type": "Person",
"name": ""
},
"publisher": {
"@type": "Organization",
"name": "{{getenvconf('SiteDomain')}}",
"logo": {
"@type": "ImageObject",
"url": "http://stc.v3.news.zing.vn/wap/css/img/logo_zing_black@2x.png",
"width": 300,
"height": 100
}
}
}
</script>
<!-- GOOGLE BREADCRUMB STRUCTURED DATA -->
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [
{
"@type": "ListItem",
"position": 1,
"item": {
"@id": "http://{{getenvconf('SiteDomain')}}",
"name": "Trang chủ"
}
},{
"@type": "ListItem",
"position": 2,
"item": {
"@id": "/danh-muc/{{$post->cate_slug}}.{{$post->cate_id}}.html",
"name": "{{$post->cate_name}}"
}
}
]
}
</script>
<!-- FACEBOOK OPEN GRAPH -->
<meta property="fb:app_id" content="250027698816567" />
<meta property="og:site_name" content="{{getenvconf('SiteDomain')}}" />
<meta property="og:rich_attachment" content="true" />
<meta property="article:publisher" content="https://www.facebook.com/{{getenvconf('SiteDomain')}}" />
<meta property="og:type" content="article" />
<meta property="og:url" content="{{url('/')}}/{{$post->cate_slug}}/{{$post->post_slug}}.{{$post->id}}.html" />
<meta property="og:title" content="{{$post->title}}" />
<meta property="og:description" content="{{$post->description}}" />
<meta property="og:image:url" content="{{asset('upload/images/posts/')}}/{{getenvconf('HorizontalImageWidth').'x'.getenvconf('HorizontalImageHeight')}}/{{$post->image}}" />
<meta property="og:image:width" content="{{getenvconf('HorizontalImageWidth')}}" />
<meta property="og:image:height" content="{{getenvconf('HorizontalImageHeight')}}" />
<meta property="article:published_time" content="{{$post->created_at}}" />
<meta property="article:modified_time" content="{{$post->updated_at}}" />
<meta property="article:section" content="Phân tích" />
  <?php $arrTags = explode(",",$post->tags); 

  ?>
@foreach($arrTags as $tag)
    <meta property="article:tag" content="{{$tag}}"/>
@endforeach
@endsection
@section('content')

    <section id="feature_category_section" class="feature_category_section single-page section_wrapper">
    <div class="container">   
        <div class="row">
             <div class="col-md-9">
                <div class="single_content_layout">
                    <div class="item feature_news_item">
                       {{--  <div class="item_img">
                            <img  class="img-responsive" src="assets/img/img-single.jpg" alt="Chania">
                        </div><!--item_img-->  --}}
                            <div class="item_wrapper">
                                <div class="news_item_title">
                                    <h2><a href="#">{{$post->title}}</a></h2>
                                </div><!--news_item_title-->
                                <div class="item_meta">
                                 <?php \Carbon\Carbon::setLocale('vi');?>
                                 Thời gian: {!! \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() !!}</div>

                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                    </span>

                                    <div class="single_social_icon">

                                  <div class="fb-share-button" data-href="http://sitenews.dev/bai-viet/helly-tong-co-gai-hien-dai-chon-goc-song-an-yen.9.html#" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="http://sitenews.dev/bai-viet/helly-tong-co-gai-hien-dai-chon-goc-song-an-yen.9.html#&amp;src=sdkpreparse">Chia sẻ</a></div>
                                      
                                      <button  class="btn share-btn clearfix">Share kết quả lên tường</Button>


                                      <a class="icons-sm fb-ic share-btn" ><i class="fa fa-facebook"></i><span>Facebook</span></a>
                                        <!--Twitter-->
                                        <a class="icons-sm tw-ic" href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                                        <!--Google +-->
                                        <a class="icons-sm gplus-ic" href="#"><i class="fa fa-google-plus"></i><span>Google Plus</span></a>
                                        <!--Linkedin-->
                                        <a class="icons-sm li-ic" href="#"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>

                                    </div> <!--social_icon1-->

                                    <div class="item_content">
                                      {!!$post->content!!}
                                    </div><!--item_content-->
                                    <div class="category_list">

                                    @if($post->tags !='')
                                            @foreach($arrTags as $tag)
                                                <a href="#">{{$tag}}</a>
                                            @endforeach
                                    @endif
                                           
                                       
                                       
                                    </div><!--category_list-->
                            </div><!--item_wrapper-->   
                    </div><!--feature_news_item-->
                    
                    <div class="add_a_comment">
                        <div class="single_media_title"><h2>Bình luận</h2></div>
                        <div class="comment_form">
                          <div class="fb-comments" data-href="{!! url('/') !!}/{!! $cateSlug; !!}/{!! $post->slug; !!}.{{$post->id}}.html" data-width="100%" data-numposts="5"></div>
                        </div><!--comment_form-->
                    
                    </div><!--add_a_comment-->
                    <div class="single_related_news">
                     <div class="single_media_title"><h2>Có thể bạn quan tâm</h2></div>
                        <div class="media_wrapper">
                        @foreach($relatedPosts as $relatedPost)
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{url('/')}}/{{$relatedPost->cate_slug}}/{{$relatedPost->post_slug}}.{{$relatedPost->id}}.html"><img class="media-object lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-original="{{asset('upload/images/posts/')}}/{{getenvconf('TinyImageWidth').'x'.getenvconf('TinyImageHeight')}}/{{$relatedPost->image}}" alt="{{$relatedPost->title}}"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="{{url('/')}}/{{$relatedPost->cate_slug}}/{{$relatedPost->post_slug}}.{{$relatedPost->id}}.html">{{str_limit($relatedPost->title, 150)}}
                                    </a></h4>
                                    <div class="media_meta">
                                        <?php \Carbon\Carbon::setLocale('vi');?>
                                        Thời gian: {!! \Carbon\Carbon::createFromTimeStamp(strtotime($relatedPost->created_at))->diffForHumans() !!}
                                    </div>
                                    <div class="media_content"><p>{{str_limit($relatedPost->description, 190)}}</p>
                                    </div><!--media_content-->
                                </div><!--media-body-->
                            </div><!--media-->

                        @endforeach

                        </div><!--media_wrapper-->
                    </div><!--single_related_news-->

{{-- 
                    <div class="ad">
                        <img class="img-responsive" src="assets/img/img-single-ad.jpg" alt="Chania">
                    </div> --}}



                             
                </div><!--single_content_layout-->
             </div>

            <div class="col-md-3">
                   @include('guests.inc.slide-bar')
            </div>
        </div>      
</section><!--feature_category_section-->



        <style> .fb_dialog{z-index:999999999} </style>
        
</section><!--feature_category_section-->
@endsection
@section('footer')
<script>
    $(document).ready(function(){
        $('.share-btn').click(function(){
            sharefb();
        });
    });
</script>

<script>
        function sharefb(){
            console.log("share");
            FB.ui({
            method: 'share',
            display: 'popup',
            href: window.location.href,
            mobile_iframe: true,
            picture: 'http://znews-photo-fbcrawler.d.za.zdn.vn/w720/Uploaded/aohunkx/2017_07_10/149707153283260buduc.jpg',
            title: '{{$post->title}}',
            description: '{!! $post->description !!}',
            caption: '{{getenvconf('SiteDomain')}}'
            
            }, function(response){});
    }

</script>
@endsection
