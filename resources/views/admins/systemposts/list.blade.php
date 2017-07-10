@extends('admins.master')
@section('header')
<title>Admin::Quản lý bài viết hệ thống</title>
@endsection
@section('title','Quản lý bài viết hệ thống')
@section('content')
<div ng-controller="SystemPostListController">

  <div class="row" >

 
    
  <div class="col-sm-4">
    <div class="input-group custom-search-form">
      <input type="text" ng-model="txtKeyword" ng-change="changeKey()" class="form-control" placeholder="Nhập tên bài viết... ">
      <span class="input-group-addon" id="sizing-addon2"> <i class="fa fa-search"></i></span>

    </div>
  </div>
  <div class="col-sm-4">
    <a href="{{ url('adminsites/systempost/add') }}" >Thêm bài viết</a>
  </div>
</div>
<table class="table table-hover" >
  <thead>
    <tr>
      <th>Mã</th>
      <th>Tiêu đề</th>
      <th></th>
 
    </tr>
  </thead>
  <tbody>
   <tr ng-repeat="post in listSystemPost">
    <td>{%post.id%}</td>
    <td>{%post.title%}</td>
    <td>
     <a class="btn btn-xs btn-primary" ng-href="{{ url('adminsites/systempost/detail') }}/{%post.id%}" >
       <i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Detail
     </a>
     <a class="btn btn-xs btn-primary" ng-href="{{ url('adminsites/systempost/edit') }}/{%post.id%}" >
       <i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Sửa
     </a>
     <a class="btn btn-xs btn-danger" ng-click="delete(post.id)" >
       <i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Xóa
     </a>

   </td>
 </tr>
</tbody>
</table>

<div class="btn-toolbar" role="toolbar" aria-label="...">
  <div class="btn-group" role="group" aria-label="...">
  	<button type="button" ng-repeat="n in [1,total] | makeRange" ng-click="changePage(n)" class="btn btn-default" ng-disabled="page == n">{% n %}</button>
  </div>

</div>


</div>
@endsection
@section('footer')
<script src="<?php echo asset('app/controller/admins/SystemPostController.js') ; ?>"></script>  
@endsection