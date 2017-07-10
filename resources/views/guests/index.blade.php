@extends('guests.master')
@section('heading')
<title>Kênh giải trí tuổi teen - {{getenvconf('SiteDomain')}}</title>
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
                                        <img class="img-responsive" src="{{asset('upload/images/posts/')}}/{{getenvconf('BigImageWidth').'x'.getenvconf('BigImageHeight')}}/{{$featurePost->image}} " alt="{{$featurePost->title}}">
                                    </div> <!--item_img-->
                                    <div class="item_title_date">
                                        <div class="news_item_title">
                                            <h2><a href="{{url('/')}}/{{$featurePost->cate_slug}}/{{$featurePost->post_slug}}.{{$featurePost->id}}.html">{{ str_limit($featurePost->title, 80)}}</a></h2>
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
                                                <h2><a href="{{url('/')}}/{{$newestPost->cate_slug}}/{{$newestPost->post_slug}}.{{$newestPost->id}}.html">{{str_limit($newestPost->title,30) }}</a></h2>
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
                    <div class="item_caregory red"><h2><a href="{{url('danh-muc')}}/{{$cate->slug}}.{{$cate->id}}.html">{{$cate->name}}</a></h2></div>
                        <div class="row">
                        <?php
                        $posts= $cate->posts();
                        $postFirst = $posts->select('posts.image','posts.title','posts.description','posts.slug as post_slug', 'posts.id')
                        ->where('posts.status','=','active')
                        ->orderBy('posts.created_at','DESC')->first();
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
                                                <h2><a href="{{url('/')}}/bai-viet/{{$postFirst->post_slug}}.{{$postFirst->id}}.html">{{$postFirst->title}}</a></h2>
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
                                     $posts = $posts->select('image','title','description','slug as post_slug','id')
                                     ->where('status','=','active')->orderBy('created_at','DESC')->limit(4)->offset(1)->get(); 
                                     $count=0;
                                ?>
                                 @foreach($posts as $post)

                               
                        
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{url('/')}}/bai-viet/{{$post->post_slug}}.{{$post->id}}.html"><img class="media-object" src="{{asset('upload/images/posts/')}}/{{getenvconf('TinyImageWidth').'x'.getenvconf('TinyImageHeight')}}/{{$post->image}}" alt="Generic placeholder image"></a>
                                        </div><!--media-left-->
                                        <div class="media-body">
                                            <h3 class="media-heading"><a href="{{url('/')}}/bai-viet/{{$post->post_slug}}.{{$post->id}}.html">{{str_limit($post->title,70)}}
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










            </div><!--col-md-9-->

            <div class="col-md-3">
                @include('guests.inc.slide-bar')
            </div>
        </div>      
</section><!--feature_category_section-->

   
@endsection
@section('footer')


<script>
    
</script>
@endsection
