<?php 
    $lastestPosts = App\Post::join('categories','categories.id','=','posts.cate_id')
    ->select('posts.title','posts.description','posts.slug as post_slug','posts.image','posts.created_at','categories.slug as cate_slug','posts.id')
    ->where('posts.status','=','active')
    ->orderBy('posts.created_at','DESC')->limit(5)->get();
    
    $topViewPosts = App\Post::join('categories','categories.id','=','posts.cate_id')
    ->select('posts.title','posts.description','posts.slug as post_slug','posts.image','posts.created_at','categories.slug as cate_slug','posts.id')
    ->where('posts.status','=','active')
    ->where('posts.created_at','<=',date("Y-m-d") )
    ->where('posts.created_at','>=',date('Y-m-d',strtotime("-7 days")))
    ->orderBy('posts.view','DESC')
    ->limit(5)->get();
   
   $recommentPosts = App\Post::join('categories','categories.id','=','posts.cate_id')
    ->select('posts.title','posts.description','posts.slug as post_slug','posts.image','posts.created_at','categories.slug as cate_slug','posts.id')
    ->where('posts.status','=','active')
    ->where('posts.created_at','<=',date("Y-m-d") )
    ->where('posts.created_at','>=',date('Y-m-d',strtotime("-7 days")))
    ->inRandomOrder()
    ->limit(8)->get();
  //  echo date('Y-m-d',strtotime("-7 days"));
  //  dd($topViewPosts);
?>
                <div class="tab sitebar">
                    <ul class="nav nav-tabs">
                        <li class="active"><a  href="#1" data-toggle="tab">Mới nhất</a></li>
                        <li><a href="#2" data-toggle="tab">Nổi bật</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="1">
                        @foreach($lastestPosts as $lastestPost)
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{url('/')}}/{{$lastestPost->cate_slug}}/{{$lastestPost->post_slug}}.{{$lastestPost->id}}.html"  ><img class="media-object" src="{{asset('upload/images/posts/')}}/{{getenvconf('TinyImageWidth').'x'.getenvconf('TinyImageHeight')}}/{{$lastestPost->image}}" alt="{{$lastestPost->title}}"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="{{url('/')}}/{{$lastestPost->cate_slug}}/{{$lastestPost->post_slug}}.{{$lastestPost->id}}.html">{{str_limit($lastestPost->title,40)}}</a></h4>
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-full"></i>
                                    </span>
                                </div><!--media-body-->
                            </div><!--media-->
                        @endforeach
                          
                          

                       
                        </div><!--tab-pane-->

                        <div class="tab-pane" id="2">
                        @foreach($topViewPosts as $topViewPost)
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{url('/')}}/{{$topViewPost->cate_slug}}/{{$topViewPost->post_slug}}.{{$topViewPost->id}}.html"><img class="media-object" src="{{asset('upload/images/posts/')}}/{{getenvconf('TinyImageWidth').'x'.getenvconf('TinyImageHeight')}}/{{$topViewPost->image}}" alt="{{$topViewPost->title}}"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="{{url('/')}}/{{$topViewPost->cate_slug}}/{{$topViewPost->post_slug}}.{{$topViewPost->id}}.html">{{str_limit($topViewPost->title,40)}}</a></h3>
                                    <span class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </span>
                                </div><!--media-body-->
                            </div><!--media-->
                        @endforeach
    

                        </div><!--tab-pane-->
                    </div><!--tab-content-->
                </div><!--tab-->
{{-- 
                <div class="ad">
                    <img class="img-responsive" src="assets/img/img-sitebar.jpg" alt="img" />
                    <img class="img-responsive" src="assets/img/img-sitebar.jpg" alt="img" />
                    <img class="img-responsive" src="assets/img/img-sitebar.jpg" alt="img" />
                    <img class="img-responsive" src="assets/img/img-sitebar.jpg" alt="img" />
                </div><!--ad-->
                
                <div class="ad">
                    <img class="img-responsive" src="assets/img/img-ad.jpg" alt="img" />
                </div>

                <div class="ad">
                    <img class="img-responsive" src="assets/img/img-ad2.jpg" alt="img" />
                </div> --}}

                <div class="most_comment">
                    <div class="sidebar_title">
                        <h2>Đề xuất</h2>
                    </div>
                    @foreach($recommentPosts as $recommentPost)
                    <div class="media">
                        <div class="media-left">
                            <a href="{{url('/')}}/{{$recommentPost->cate_slug}}/{{$recommentPost->post_slug}}.{{$recommentPost->id}}.html"><img class="media-object" src="{{asset('upload/images/posts/')}}/{{getenvconf('TinyImageWidth').'x'.getenvconf('TinyImageHeight')}}/{{$recommentPost->image}}" alt="Generic placeholder image"></a>
                        </div><!--media-left-->
                        <div class="media-body">
                            <h3 class="media-heading"><a href="{{url('/')}}/{{$recommentPost->cate_slug}}/{{$recommentPost->post_slug}}.{{$recommentPost->id}}.html">{{str_limit($recommentPost->title,37)}}</a></h3>
                             <div class="comment_box">
                                
                                 <div class="comments">
                                        <?php \Carbon\Carbon::setLocale('vi');?>
                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($recommentPost->created_at))->diffForHumans() !!}
                                 </div>
                             </div><!--comment_box-->
                        </div><!--media-body-->
                    </div><!--media-->
                    @endforeach  
                  
                </div><!--most_comment-->