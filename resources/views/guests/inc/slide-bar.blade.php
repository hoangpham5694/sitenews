<?php 
    $lastestPosts = App\Post::select('title','description','slug','image','created_at')->where('status','=','active')->orderBy('created_at','DESC')->limit(5)->get();
    $topViewPosts = App\Post::select('title','description','slug','image','created_at')->where('status','=','active')
    ->where('created_at','<=',date("Y-m-d") )
    ->where('created_at','>=',date('Y-m-d',strtotime("-7 days")))
    ->orderBy('view','DESC')
    ->limit(5)->get();
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
                                    <a href="#"><img class="media-object" src="{{asset('upload/images/posts/')}}/{{getenvconf('TinyImageWidth').'x'.getenvconf('TinyImageHeight')}}/{{$lastestPost->image}}" alt="Generic placeholder image"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{str_limit($lastestPost->title,40)}}</a></h4>
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
                                    <a href="#"><img class="media-object" src="assets/img/img-list4.jpg" alt="Generic placeholder image"></a>
                                </div><!--media-left-->
                                <div class="media-body">
                                    <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
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
                        <h2>Most Commented</h2>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="assets/img/img-list.jpg" alt="Generic placeholder image"></a>
                        </div><!--media-left-->
                        <div class="media-body">
                            <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                             <div class="comment_box">
                                <div class="comments_icon"> <i class="fa fa-comments" aria-hidden="true"></i></div>
                                 <div class="comments"><a href="#">9 Comments</a></div>
                             </div><!--comment_box-->
                        </div><!--media-body-->
                    </div><!--media-->
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="assets/img/img-list2.jpg" alt="Generic placeholder image"></a>
                        </div><!--media-left-->
                        <div class="media-body">
                            <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                            <div class="comment_box">
                                <div class="comments_icon"> <i class="fa fa-comments" aria-hidden="true"></i></div>
                                <div class="comments"><a href="#">20 Comments</a></div>
                            </div><!--comment_box-->
                        </div><!--media-body-->
                    </div><!--media-->
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="assets/img/img-list3.jpg" alt="Generic placeholder image"></a>
                        </div><!--media-left-->
                        <div class="media-body">
                            <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                            <div class="comment_box">
                                <div class="comments_icon"> <i class="fa fa-comments" aria-hidden="true"></i></div>
                                <div class="comments"><a href="#">23 Comments</a></div>
                            </div><!--comment_box-->
                        </div><!--media-body-->
                    </div><!--media-->
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object" src="assets/img/img-list3.jpg" alt="Generic placeholder image"></a>
                        </div><!--media-left-->
                        <div class="media-body">
                            <h3 class="media-heading"><a href="#">Spain going to made class football</a></h3>
                            <div class="comment_box">
                                <div class="comments_icon"> <i class="fa fa-comments" aria-hidden="true"></i></div>
                                <div class="comments"><a href="#">44 Comments</a></div>
                            </div><!--comment_box-->
                        </div><!--media-body-->
                    </div><!--media-->
                </div><!--most_comment-->