@extends('managers.master')
@section('header')
<title>Manager::Thêm software</title>

<link rel="stylesheet" type="text/css" href="{{asset('selectizejs/dist/css/selectize.default.css')}}" />
@endsection
@section('title','Thêm software')
@section('content')

<div class="col-md-10" >
	<form name="frmTeacher" id="selectizeForm" action="" method="POST" enctype="multipart/form-data"  class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
      <label class="control-label col-sm-3" for="txtName">Tên:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control"  required="true" name="txtName" id="txtName" placeholder="Vui lòng nhập tiêu đề">

      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="txtTitle">Tiêu đề:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control"  name="txtTitle" id="txtTitle" placeholder="Vui lòng nhập tiêu đề">

      </div>
    </div>
    


    <div class="form-group">
      <label class="control-label col-sm-3" for="sltCate">Danh mục:</label>
      <div class="col-sm-9">

      <select class="form-control" name="sltCate" id="sltCate">
         
          @foreach($cates as $cate)
               <option value="{{$cate->id}}">{{$cate->name}}</option>
          @endforeach

        </select>


      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-3" for="sltSystem">Hệ điều hành:</label>
      <div class="col-sm-9">

      <select class="form-control" name="sltSystem" id="sltSystem">
         
          @foreach($systems as $system)
               <option value="{{$system->id}}">{{$system->name}}</option>
          @endforeach

        </select>


      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-3" for="fileImage">Hình đại diện:</label>
      <div class="col-sm-9">

       <input type="file"  name="fileImage" id="fileImage">

     </div>
   </div>
   <div class="form-group">
    <label class="control-label col-sm-3" for="txtSize">Size:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"   name="txtSize" id="txtSize" placeholder="Ex: 1024 Kb">

    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-3" for="txtVersion">Phiên bản:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control"   name="txtVersion" id="txtVersion" placeholder="Ex: v1.0.1">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="txtSysRequireInput">Yêu cầu hệ thống:</label>
    <div class="col-sm-9">
      <input type="text" class="demo-default selectized" name="txtSysRequire"   id="txtSysRequireInput"  placeholder="Ex: Windows 98, Windows XP, MaxOS X....">


    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="txtDirectLink">Link tải chính:</label>
    <div class="col-sm-9">
      <input type="url" name="txtDirectLink" class="form-control url"  id="txtDirectLink"  placeholder="">


    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" class="form-control" for="txtMirrorLink1">Link tải dự phòng 1:</label>
    <div class="col-sm-9">
      <input type="url" name="txtMirrorLink1" class="form-control"  id="txtMirrorLink1"  placeholder="">
    </div>
  </div>
  <div class="form-group">
  <label class="control-label col-sm-3" for="txtMirrorLink2">Link tải dự phòng 2:</label>
    <div class="col-sm-9">
      <input type="url" name="txtMirrorLink2" class="form-control"  id="txtMirrorLink2"  placeholder="">
    </div>
  </div>
    <div class="form-group">
  <label class="control-label col-sm-3" for="txtCrackLink">Link tải crack:</label>
    <div class="col-sm-9">
      <input type="url" name="txtCrackLink" class="form-control"  id="txtCrackLink"  placeholder="">
    </div>
  </div>
      <div class="form-group">
  <label class="control-label col-sm-3" for="txtPublisherName">Tên Nhà phát hành:</label>
    <div class="col-sm-9">
      <input type="text" name="txtPublisherName" class="form-control" id="txtPublisherName"  placeholder="">
    </div>
  </div>
      <div class="form-group">
  <label class="control-label col-sm-3" for="txtPublisherUrl">Url Nhà phát hành:</label>
    <div class="col-sm-9">
      <input type="url" name="txtPublisherUrl" class="form-control"  id="txtPublisherUrl"  placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="txtDescription">Mô tả:</label>
    <div class="col-sm-9">

      <textarea name="txtDescription" id="txtDescription" class="form-control" rows="3" ></textarea>

    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-3" for="txtContent">Nội dung:</label>
    <div class="col-sm-9">

      <textarea name="txtContent" id="txtContent" class="form-control" rows="30" ></textarea>

    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-3" for="txtTags">Tags:</label>
    <div class="col-sm-9">
      <input type="text" class="demo-default selectized" name="txtTags"   id="txtTags"  placeholder="">


    </div>
  </div>


  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" ng-disabled="frmTeacher.$invalid"  class="btn btn-default">Thêm software</button>
    </div>
  </div>
</form>

</div>

@endsection
@section('footer')
<script src="{{asset('micropluginjs/microplugin.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="http://lantoa.net/assets/plugins/selectize.min.js" type="text/javascript" charset="utf-8"></script>

</script>
<script>
  $('#txtSysRequireInput').selectize({

    delimiter: ',',
    persist: false,
    placeholder: 'Ex: Windows xp, Windows 7, MaxOS X',
    create: function(input) {
      return {
        value: input,
        text: input
      }
    }
  });
  $('#txtTags').selectize({

    delimiter: ',',
    persist: false,

    create: function(input) {
      return {
        value: input,
        text: input
      }
    }
  });
</script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea#txtContent",
    plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern code codesample preview"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media emoticons code codesample preview",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection
