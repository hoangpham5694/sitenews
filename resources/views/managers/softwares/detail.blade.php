@extends('managers.master')
@section('header')
    <title>Manager::Chi tiết phần mềm</title>

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
@section('title','Chi tiết phần mềm')
@section('content')
<div class="row">
	
	<div class="col-sm-8">
	<form class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-3 control-label">Tên</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->name}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Người tạo</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->user_lastname}} {{$software->user_firstname}}</p>
			</div>
		</div>
				<div class="form-group">
			<label class="col-sm-3 control-label">Danh mục</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->cate_name}}</p>
			</div>
		</div>
				<div class="form-group">
			<label class="col-sm-3 control-label">Hệ điều hành</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->system_name}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Nhà phát hành</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->publisher_name}}</p>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Size</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->size}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Version</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->version}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Yêu cầu hệ thống</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->system_require}}</p>
			</div>
		</div>
		<div class="form-group">
		<label class="col-sm-3 control-label">Url dẫn chính</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->direct_link}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Url dự phòng 1</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->mirror_link1}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Url dự phòng 2</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->mirror_link2}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Url crack</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->crack_link}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">View</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->view}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Share</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->share}}</p>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Download</label>
			<div class="col-sm-9">
				<p class="form-control-static">{{$software->downloaded}}</p>
			</div>
		</div>
		</form>
	</div>
	<div class="col-sm-4">
		<img src="{{asset("upload/images/128x128")}}/{{$software->image}}" class="detail" alt="">
	</div>
</div>
<hr>

	<p class="description">{{$software->description}}</p>
<br>
{!!$software->content!!}

@endsection
@section('footer')

@endsection