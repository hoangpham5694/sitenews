@extends('admins.master')
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
	
	max-width:100%;
}
.description{
	font-weight: bold;
}
.post-content img{
    max-width:100%;
    height: auto;
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

		

		
		
	
	
		


		</form>
	</div>
	
</div>
<hr>

	<p class="description">{{$post->description}}</p>
<br>
<div class="post-content">
	{!!$post->content!!}
</div>


@endsection
@section('footer')

@endsection