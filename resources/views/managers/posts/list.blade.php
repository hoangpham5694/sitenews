@extends('managers.master')
@section('header')
<title>Manager::Quản lý bài viết</title>
@endsection
@section('title','Quản lý bài viết')
@section('content')
<div ng-controller="PostListController">

  <div class="row" >
  <div class="col-lg-2 col-md-3">
    <div class="form-group">
      
        <span>Lọc bài viết</span>

    </div>
  </div>

    <div class="col-lg-2 col-md-3">
     <div class="form-group">
      
        <select name="" ng-model="sltStatus" class="form-control" ng-change="changeStatus()" id="">
          <option value="">-Trạng thái-</option>
         
          <option value="pending" >Pending</option>
          <option value="active" >Active</option>
          <option value="stop" >Stop</option>
        </select>
     
    </div>
  </div>
  <div class="col-lg-2 col-md-3">
    <div class="form-group">
      
        <select name="" ng-model="sltCateId" class="form-control" ng-change="changeCate()" id="">
          <option value="">-Danh mục-</option>
          @foreach($cates as $cate)
          <option value="{{ $cate->id }}" >{{ $cate->name }}</option>
          @endforeach

        </select>
      

    </div>
  </div>
    
      <div class="col-lg-2 col-md-3">
    <div class="form-group">
      
        <select name="" ng-model="sltUserId" class="form-control" ng-change="changeUser()" id="">
          <option value="">-User-</option>
          @foreach($users as $user)
          <option value="{{ $user->id }}" >{{ $user->lastname }} {{ $user->firstname }}</option>
          @endforeach

        </select>
      

    </div>
  </div>
  <div class="col-lg-4 col-md-12">
    <div class="input-group custom-search-form">
      <input type="text" ng-model="txtKeyword" ng-change="changeKey()" class="form-control" placeholder="Nhập Tên app... ">
      <span class="input-group-addon" id="sizing-addon2"> <i class="fa fa-search"></i></span>

    </div>
  </div>
</div>
<table class="table table-hover" >
  <thead>
    <tr>
      <th>Mã</th>
      <th>Tiêu đề</th>
      <th>Người tạo</th>
      <th>Danh mục</th>
     
      <th>Lưọt xem</th>
  <th>Feature</th>
      <th>Status</th>

<th></th>
 
    </tr>
  </thead>
  <tbody>
   <tr ng-repeat="post in posts">
    <td>{%post.id%}</td>
    <td>{%post.title%}</td>
    <td>{%post.user_lastname%} {%post.user_firstname%}</td>
    <td>{%post.cate_name%}</td>
  
     <td>{%post.view%}</td>
  <td>
    <div class="btn-group">
    <button type="button" ng-class="{'btn-success':post.featured_at}" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <span ng-if="post.featured_at">Featured</span> <span ng-if="post.featured_at == null">Not Featured</span> <span class="caret"></span>
     </button>
     <ul class="dropdown-menu">
      <li ng-if="post.featured_at==null"><a  href="" ng-click="setFeature(post.id,'set')" > <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Feature</a> </li>
      <li ng-if="post.featured_at"> <a  href="" ng-click="setFeature(post.id,'undo')"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>   Undo Featured</a>  </li>

    </ul>
  </div>
  </td>
    <td> 
<div class="btn-group">
  <button type="button" ng-class="{'btn-success':post.status =='active','btn-warning':post.status =='pending','btn-danger':post.status =='stop'}" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   {%post.status%} <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a ng-click="setStatus(post.id,'active')"  class="btn btn-success btn-xs" ng-disabled="post.status == 'active'">Active</a> </li>
  <li> <a ng-disabled="post.status == 'pending'" class="btn btn-warning btn-xs" ng-click="setStatus(post.id,'pending')">Pending</a>  </li>
   <li>  <a ng-disabled="post.status == 'stop'" class="btn btn-danger btn-xs" ng-click="setStatus(post.id,'stop')">Stop</a></li>
  </ul>
</div>

    
   
  
   </td>
    <td>
     <a class="btn btn-xs btn-primary" ng-href="{{ url('managersites/post/detail') }}/{%post.id%}" >
       <i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Detail
     </a>
     <a class="btn btn-xs btn-primary" ng-href="{{ url('managersites/post/edit') }}/{%post.id%}" >
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
<script src="<?php echo asset('app/controller/managers/PostController.js') ; ?>"></script>  
@endsection