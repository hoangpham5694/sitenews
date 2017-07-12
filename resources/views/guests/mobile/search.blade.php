@extends('guests.master')
@section('heading')
<title>Tìm kiếm: {{$keyword}}&nbsp - &nbsp{{getenvconf('SiteDomain')}}</title>
<meta id="metaKeywords" name="keywords" content="Blog, Tin tức, Báo, Việt Nam, Hà Nội, Hồ Chí Minh, Đà Nẵng, Đời sống, Phóng sự, Pháp luật, Thế giới, Khám phá, Thị trường, Chứng khoán, Kinh tế, Bất động sản, Giáo dục, Tuyển sinh, Teen, Thể thao, Ngoại hạng, Champion, La liga, Công nghệ, điện thoại, Oto, Xe Máy, Giải trí, Showbiz, Sao Việt, Âm nhạc, VPOP, KPOP, Phim ảnh, Điện ảnh, Đẹp, Thời trang, Làm đẹp, Người Đẹp, Tình yêu, Du lịch, Ẩm thực, Sách, Cười" />
<meta id="metaDescription" name="description" content="Cập nhật tin tức mới và nóng nhất về showbiz, đời sống giới trẻ, hot tên, hot face" />
<meta name="author" content="{{getenvconf('SiteDomain')}}" />

<!-- ROBOTS -->
<meta name="googlebot" content="noarchive" />
<meta name="robots" content="noarchive" />
<!-- GENERAL GOOGLE SEARCH META -->
<script type="application/ld+json">
{
"@context" : "http://schema.org",
"@type" : "WebSite",
"name" : "{{$keyword}} - Tìm kiếm - {{getenvconf('SiteDomain')}}",
"alternateName" : "Tìm kiếm bài viết về {{$keyword}} trên {{getenvconf('SiteName')}}",
"url" : "http://{{getenvconf('SiteName')}}/tim-kiem.html?key={{$keyword}}"
}
</script>
<!-- FACEBOOK OPEN GRAPH -->
<meta property="fb:app_id" content="1892596964352709" />
<meta property="og:site_name" content="{{getenvconf('SiteDomain')}}" />
<meta property="og:rich_attachment" content="true" />
<meta property="article:publisher" content="https://www.facebook.com/" />
<meta property="og:type" content="website" />
<meta property="og:image" content="http://stc.v3.news.zing.vn/images/facebook_thumb.png" />
<meta property="og:image:width" content="800" />
<meta property="og:image:height" content="354" />
<meta property="og:url" content="http://{{getenvconf('SiteDomain')}}" />
<meta property="og:title" content="{{getenvconf('SiteNames')}}" />
<meta http-equiv="REFRESH" content="1800" />
<script type="text/javascript">
zaConfig = {
pageid: '1'
}
var cate_path = 'search';
</script>

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
