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
                        <h2>Tìm kiếm: {{$keyword}}</h2>
                    </div>
                    <div class="list-posts" data-ng-init="getListPostsSearch(1,'{{$keyword}}');"  >
                            <div class="media" ng-repeat="post in listPostsSearch">
                                <div class=" media-left">
                                    <a ng-href="{{asset('/')}}{%post.cate_slug%}/{%post.post_slug%}.{%post.id%}.html"><img class="media-object" ng-src="{{asset('upload/images/posts/')}}/{{getenvconf('SmallImageWidth').'x'.getenvconf('SmallImageHeight')}}/{%post.image%} " alt="{%post.title%}"></a>
                                </div><!--media-left-->
                               
                                <div class=" media-right">
                                    <h3 class="media-heading"><a ng-href="{{asset('/')}}{%post.cate_slug%}/{%post.post_slug%}.{%post.id%}.html"> <span ng-bind="post.title"></span></a></h3>
                                    <div class="media_meta"><p ng-bind=" post.created_at | dateFilter | date:'dd-MM-yyyy' "></p></div>
                                    <div class="media_content"><p ng-bind="post.description"></p>
                                    </div><!--media_content-->
                                </div>
                                <div class="clearfix"></div>
                                    
                                   
                          
                            </div><!--media-->

                    </div>

<div class="pagination-container">

   <button type="button" ng-repeat="n in [1,totalPostsSearch] | makeRange" ng-click="getListPostsSearch(n,'{{$keyword}}')"  class="btn btn-default" ng-disabled="pageListPostsSearch == n"><span ng-bind="n"></span></button>


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
