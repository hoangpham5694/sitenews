@extends('guests.master')
@section('header')

@endsection
@section('content')
    <section id="feature_news_section" class="feature_news_section section_wrapper">
    <div class="container">   
        <div class="row">
            <div class="col-md-6">
                <div class="feature_news_carousel">
                    <div id="featured-news-carousal" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">   
                        <?php $count=0; ?>  
                        @foreach($featurePosts as $featurePost)
                            <?php $count++; ?>
                            <div class="item <?php if($count==1) echo 'active'; ?> feature_news_item">
                                <div class="item_wrapper">
                                    <div class="item_img">
                                        <img class="img-responsive" src="{{asset('upload/images/posts/')}}/{{getenvconf('BigImageWidth').'x'.getenvconf('BigImageHeight')}}/{{$featurePost->image}} " alt="Chania">
                                    </div> <!--item_img-->
                                    <div class="item_title_date">
                                        <div class="news_item_title">
                                            <h2><a href="single.html">{{ str_limit($featurePost->title, 80)}}</a></h2>
                                        </div>
                                      
                                    </div> <!--item_title_date-->
                                </div>  <!--item_wrapper-->
                                <div class="item_content">{{ str_limit($featurePost->description, 100)}}</div>

                            </div><!--feature_news_item-->
                        @endforeach



                             

                            <!-- Left and right controls -->
                            <div class="control-wrapper">
                                <a class="left carousel-control" href="#featured-news-carousal" role="button" data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                </a>
                                <a class="right carousel-control" href="#featured-news-carousal" role="button" data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div><!--carousel-inner-->
                    </div><!--carousel-->
                </div><!--feature_news_carousel-->
            </div><!--col-md-6-->
            
            <div class="col-md-6">
                <div class="feature_news_static">
                    <div class="row">         
                    @foreach($newestPosts as $newestPost)                       
                        <div class="col-md-6">
                            <div class="feature_news_item">
                                <div class="item active">
                                    <div class="item_wrapper">
                                        <div class="item_img">
                                            <img class="img-responsive" src="{{asset('upload/images/posts/')}}/{{getenvconf('VerticalImageWidth').'x'.getenvconf('VerticalImageHeight')}}/{{$newestPost->image}}" alt="Chania">
                                        </div> <!--item_img-->
                                        <div class="item_title_date">
                                            <div class="news_item_title">
                                                <h2><a href="single.html">{{str_limit($newestPost->title,30) }}</a></h2>
                                            </div>
                                          
                                        </div><!--item_title_date-->
                                    </div> <!--item_wrapper-->
                                    <div class="item_content">{{str_limit($newestPost->description,51) }}
                                    </div>

                                </div><!--item-->                            
                            </div><!--feature_news_item-->
                        </div>
                    @endforeach


                    </div><!--row-->


                </div><!--feature_news_static-->
            </div><!--col-md-6-->


        </div><!--row-->
    </div><!--container-->      
</section><!--feature_news_section-->

    <section id="feature_category_section" class="feature_category_section section_wrapper">
    <div class="container">   
        <div class="row">
            <div class="col-md-9">


            @foreach($cates as $cate)
                <div class="category_layout">
                    <div class="item_caregory red"><h2><a href="category.html">{{$cate->name}}</a></h2></div>
                        <div class="row">
                        <?php
                        $posts= $cate->posts();
                        $postFirst = $posts->select('image','title','description','slug','created_at')->where('status','=','active')->orderBy('created_at','DESC')->first();
                       // echo $postFirst->title;

                       
                        ?>
                        
                           
                            <div class="col-md-7">
                            
                            @if($postFirst!=null)
                                <div class="item feature_news_item">
                                    <div class="item_wrapper">
                                        <div class="item_img">
                                            <img class="img-responsive" src="{{asset('upload/images/posts/')}}/{{getenvconf('BigImageWidth').'x'.getenvconf('BigImageHeight')}}/{{$postFirst->image}}" alt="Chania">
                                        </div><!--item_img--> 
                                        <div class="item_title_date">
                                            <div class="news_item_title">
                                                <h2><a href="#">{{$postFirst->title}}</a></h2>
                                            </div><!--news_item_title-->
                                            <div class="item_meta"><a href="#">
                                                                <?php \Carbon\Carbon::setLocale('vi');?>
                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($postFirst->created_at))->diffForHumans() !!}
                                            </a></div>
                                        </div><!--item_title_date-->
                                    </div><!--item_wrapper-->   
                                    <div class="item_content">
                                    {{str_limit($postFirst->description, 100)}}
                                    </div><!--item_content-->

                                </div><!--feature_news_item-->
                            @endif
                            </div><!--col-md-7-->
                            
                            <div class="col-md-5">
                                <div class="media_wrapper">
                                <?php 
                                     $posts = $posts->select('image','title','description','slug')->where('status','=','active')->orderBy('created_at','DESC')->limit(4)->offset(1)->get(); 
                                     $count=0;
                                ?>
                                 @foreach($posts as $post)

                               
                        
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="{{asset('upload/images/posts/')}}/{{getenvconf('TinyImageWidth').'x'.getenvconf('TinyImageHeight')}}/{{$post->image}}" alt="Generic placeholder image"></a>
                                        </div><!--media-left-->
                                        <div class="media-body">
                                            <h3 class="media-heading"><a href="#">{{str_limit($post->title,70)}}
                                            </a></h3>

                                            <p>{{str_limit($post->description,55)}}</p>

                                        </div><!--media-body-->
                                    </div><!--media-->
                               
                                @endforeach
                             
                                    


                                </div><!--media_wrapper-->
                                 
                            </div><!--col-md-5-->
                            
                       
                        </div><!--row-->
                    </div><!--category_layout-->
            @endforeach








                
                <div id="more_news_item" class="more_news_item">
                    <div class="more_news_heading"><h2><a href="#">More News</a></h2></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature_news_item">
                                <div class="item">
                                    <div class="item_wrapper">
                                        <div class="item_img">
                                            <img class="img-responsive" src="assets/img/img-news.jpg" alt="Chania">
                                        </div><!--item_img--> 
                                        <div class="item_title_date">
                                            <div class="news_item_title">
                                                <h3><a href="#">Track Roboto the Real Tracker.</a></h3>
                                            </div><!--news_item_title-->
                                            <div class="item_meta"><a href="#">20Aug- 2015,</a> by:<a href="#">Jhonson</a></div>
                                        </div><!--item_title_date-->
                                    </div><!--item_wrapper-->
                                    <div class="item_content">Sed ut perspiciatis unde omnis iste natus error sit  
                                    </div><!--item_content-->

                                </div><!--item-->                            
                            </div><!--feature_news_item-->
                        </div><!--col-xs-4-->
                            
                        <div class="col-md-4">
                            <div class="feature_news_item">
                                <div class="item active">
                                    <div class="item_wrapper">
                                        <div class="item_img">
                                            <img class="img-responsive" src="assets/img/img-news1.jpg" alt="Chania">
                                        </div><!--item_img--> 
                                        <div class="item_title_date">
                                            <div class="news_item_title">
                                                <h3><a href="#">Track Roboto the Real Tracker.</a></h3>
                                            </div><!--news_item_title-->
                                            <div class="item_meta"><a href="#">20Aug- 2015,</a> by:<a href="#">Jhonson</a></div>
                                        </div><!--item_title_date-->
                                    </div><!--item_wrapper-->
                                    <div class="item_content">Sed ut perspiciatis unde omnis iste natus error sit  
                                    </div><!--item_content-->

                                </div><!--item-->                            
                            </div><!--feature_news_item-->
                        </div><!--col-xs-4-->

                        <div class="col-md-4">
                            <div class="feature_news_item">
                                <div class="item active">
                                    <div class="item_wrapper">
                                        <div class="item_img">
                                            <img class="img-responsive" src="assets/img/img-news2.jpg" alt="Chania">
                                        </div><!--item_img--> 
                                        <div class="item_title_date">
                                            <div class="news_item_title">
                                                <h3><a href="#">Track Roboto the Real Tracker.</a></h3>
                                            </div><!--news_item_title-->
                                            <div class="item_meta"><a href="#">20Aug- 2015,</a> by:<a href="#">Jhonson</a></div>
                                        </div><!--item_title_date-->
                                    </div><!--item_wrapper-->
                                    <div class="item_content">Sed ut perspiciatis unde omnis iste natus error sit  
                                    </div><!--item_content-->

                                </div><!--item-->                            
                            </div><!--feature_news_item-->
                        </div><!--col-xs-4-->
                    </div><!--row-->    
                </div><!--more_news_item--> 
            </div><!--col-md-9-->

            <div class="col-md-3">
                @include('guests.inc.slide-bar')
            </div>
        </div>      
</section><!--feature_category_section-->

    <!-- Feature Video Item -->
    <section id="feature_video_item" class="feature_video_item section_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="feature_video_wrapper">
                    <div class="feature_video_title"><h2>Featured Videos</h2></div>

                    <div id="feature_video_slider" class="owl-carousel">
                        <div class="item">
                            <div class="video_thumb"><img   src="assets/img/video.jpg" alt="Owl Image"></div>
                            <div class="video_info">
                                <div class="video_item_title"><h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3></div><!--video_item_title-->
                                <div class="item_meta"><a href="#">20Aug- 2015</a></div><!--item_meta-->
                            </div><!--video_info-->
                        </div>
                        <div class="item">
                            <div class="video_thumb"><img   src="assets/img/video2.jpg" alt="Owl Image"></div>
                            <div class="video_info">
                                <div class="video_item_title"><h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3></div><!--video_item_title-->
                                <div class="item_meta"><a href="#">20Aug- 2015</a></div><!--item_meta-->
                            </div><!--video_info-->
                        </div>
                        <div class="item">
                            <div class="video_thumb"><img   src="assets/img/video3.jpg" alt="Owl Image"></div>
                            <div class="video_info">
                                <div class="video_item_title"><h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3></div><!--video_item_title-->
                                <div class="item_meta"><a href="#">20Aug- 2015</a></div><!--item_meta-->
                            </div><!--video_info-->
                        </div>
                        <div class="item">
                            <div class="video_thumb"><img   src="assets/img/video2.jpg" alt="Owl Image"></div>
                            <div class="video_info">
                                <div class="video_item_title"><h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3></div><!--video_item_title-->
                                <div class="item_meta"><a href="#">20Aug- 2015</a></div><!--item_meta-->
                            </div><!--video_info-->
                        </div>
                        <div class="item">
                            <div class="video_thumb"><img   src="assets/img/video.jpg" alt="Owl Image"></div>
                            <div class="video_info">
                                <div class="video_item_title"><h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3></div><!--video_item_title-->
                                <div class="item_meta"><a href="#">20Aug- 2015</a></div><!--item_meta-->
                            </div><!--video_info-->
                        </div>
                        <div class="item">
                            <div class="video_thumb"><img   src="assets/img/video3.jpg" alt="Owl Image"></div>
                            <div class="video_info">
                                <div class="video_item_title"><h3><a href="#">Track & Fiels famous still in the craze of Runner world</a></h3></div><!--video_item_title-->
                                <div class="item_meta"><a href="#">20Aug- 2015</a></div><!--item_meta-->
                            </div><!--video_info-->
                        </div>
                    </div><!--feature_video_slider-->


                </div><!--col-xs-12-->
            </div><!--row-->
        </div><!--feature_video_wrapper-->
    </div><!--container-->
</section>


@endsection
@section('footer')


<script>
    
</script>
@endsection
