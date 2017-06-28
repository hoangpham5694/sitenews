@extends('managers.master')
@section('header')
<title>Manager::Quản lý software</title>
@endsection
@section('title','Quản lý software')
@section('content')
<div ng-controller="SoftwareListController">

  <div class="row" >
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
      
        <select name="" ng-model="sltSystemId" class="form-control" ng-change="changeCate()" id="">
          <option value="">-Hệ điều hành-</option>
          @foreach($systems as $system)
          <option value="{{ $system->id }}" >{{ $system->name }}</option>
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
      <th>Hệ điều hành</th> 
      <th>Lưọt tải</th>

      <th>Status</th>
      <th>Set status</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
   <tr ng-repeat="software in softwares">
    <td>{%software.id%}</td>
    <td>{%software.name%}</td>
    <td>{%software.user_lastname%} {%software.user_firstname%}</td>
    <td>{%software.cate_name%}</td>
    <td>{%software.sys_name%}</td>
     <td>{%software.downloaded%}</td>
    <td>{%software.status%}</td>
    <td> 
    <button ng-click="setStatus(software.id,'active')" class="btn btn-success btn-xs" ng-disabled="software.status == 'active'">Active</button> 
    <button ng-disabled="software.status == 'pending'" class="btn btn-warning btn-xs" ng-click="setStatus(software.id,'pending')">Pending</button>  
    <button ng-disabled="software.status == 'stop'" class="btn btn-danger btn-xs" ng-click="setStatus(software.id,'stop')">Stop</button>
   </td>
    <td>
     <a class="btn btn-xs btn-primary" ng-href="{{ url('managersites/software/detail') }}/{%software.id%}" >
       <i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Detail
     </a>
     <a class="btn btn-xs btn-primary" ng-href="{{ url('managersites/software/edit') }}/{%software.id%}" >
       <i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Sửa
     </a>
     <a class="btn btn-xs btn-danger" ng-click="delete(software.id)" >
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
<script src="<?php echo asset('app/controller/managers/SoftwareController.js') ; ?>"></script>  
@endsection