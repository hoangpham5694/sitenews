@extends('guests.master')
@section('header')

@endsection
@section('content')

    <section id="feature_category_section" class="feature_category_section single-page section_wrapper">
    <div class="container">   
        <div class="row">
             <div class="col-md-9">
                <div class="single_content_layout" ng-controller="PostController">
                    <div class="heading">
                        <h2>{{$cate->name}}</h2>
                    </div>
                    <div class="list-posts" data-ng-init="getListPostsWithCate(1,{{$cate->id}});"  >
                            <div class="media" ng-repeat="post in listPostWithCate">
                                <div class=" media-left">
                                    <a href="{{asset('/')}}{{$cate->slug}}/{%post.slug%}.{%post.id%}.html"><img class="media-object" ng-src="{{asset('upload/images/posts/')}}/{{getenvconf('SmallImageWidth').'x'.getenvconf('SmallImageHeight')}}/{%post.image%} " alt="Generic placeholder image"></a>
                                </div><!--media-left-->
                               
                                <div class=" media-right">
                                    <h3 class="media-heading"><a href="#">{%post.title%}</a></h3>
                                    <div class="media_meta"><a href="#">20Aug- 2015,</a> by:<a href="#">Jhonson</a></div>
                                    <div class="media_content"><p>{%post.description%}</p>
                                    </div><!--media_content-->
                                </div>
                                <div class="clearfix"></div>
                                    
                                   
                          
                            </div><!--media-->

                    </div>

<div class="pagination-container">

   <button type="button" ng-repeat="n in [1,totalPostWithCate] | makeRange" ng-click="getListPostsWithCate(n,{{$cate->id}})"  class="btn btn-default" ng-disabled="pageListSoftwaresWithCate == n">{% n %}</button>


</div>


                             
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
 <script src="{{asset('app/lib/angular.min.js')}}"></script> 
  <script src="{{asset('app/app.js')}}"></script> 
 <script src="{{asset('app/controller/guests/PostController.js')}}"></script> 
<script>
    
</script>
@endsection
