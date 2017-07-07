@extends('guests.master')
@section('heading')
<title> {!!$post->title!!}</title>
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
                                        <a class="icons-sm fb-ic" href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
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
                                        <?php $arrTags = explode(",",$post->tags); ?>
                                            @foreach($arrTags as $tag)
                                               
                                                <a href="#">{{$tag}}</a>
                                            @endforeach
                                       
                                       
                                    </div><!--category_list-->
                            </div><!--item_wrapper-->   
                    </div><!--feature_news_item-->
                    
                    <div class="add_a_comment">
                        <div class="single_media_title"><h2>Add a Comment</h2></div>
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
                                    <a href="{{url('/')}}/{{$relatedPost->cate_slug}}/{{$relatedPost->post_slug}}.{{$relatedPost->id}}.html"><img class="media-object" src="{{asset('upload/images/posts/')}}/{{getenvconf('TinyImageWidth').'x'.getenvconf('TinyImageHeight')}}/{{$relatedPost->image}} " alt="{{$relatedPost->title}}"></a>
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




        
</section><!--feature_category_section-->
@endsection
@section('footer')


<script>
    
</script>
@endsection
