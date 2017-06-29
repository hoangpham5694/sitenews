@extends('managers.master')
@section('header')
    <title>Manager::Chi tiết bài viết</title>

<style>
	.form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: left;
}
.form-group {
     margin-bottom: 0; 
}
img.detail{
	
	max-width:350px;
}
.description{
	font-weight: bold;
}
</style>

@endsection
@section('title','Chi tiết bài viết')
@section('content')
<div class="row">
	
	<div class="col-sm-8">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-3 control-label">Tiêu đề</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$post->title}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Người tạo</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$post->user_lastname}} {{$post->user_firstname}}</p>
			</div>
		</div>
				<div class="form-group">
			<label class="col-sm-3 control-label">Danh mục</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$post->cate_name}}</p>
			</div>
		</div>

		

		
		
	
	
		<div class="form-group">
			<label class="col-sm-3 control-label">View</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$post->view}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Share</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$post->share}}</p>
			</div>
		</div>

		</form>
	</div>
	<div class="col-sm-4">
		<img src="{{asset("upload/images/posts/555x431")}}/{{$post->image}}" class="detail" alt="">
	</div>
</div>
<hr>

	<p class="description">{{$post->description}}</p>
<br>
{!!$post->content!!}

@endsection
@section('footer')

@endsection