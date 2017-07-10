@extends('admins.master')
@section('header')
<title>Admin::Thêm Bài viết hệ thống</title>


@endsection
@section('title','Thêm bài hệ thống')
@section('content')

<div class="col-md-10" >
	<form  id="selectizeForm" action="" method="POST" enctype="multipart/form-data"  class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
      <label class="control-label col-sm-3" for="txtTitle">Tiêu đề:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control"  name="txtTitle" id="txtTitle" placeholder="Vui lòng nhập tiêu đề">

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
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" ng-disabled="frmTeacher.$invalid"  class="btn btn-default">Thêm bài viết</button>
    </div>
  </div>
</form>

</div>

@endsection
@section('footer')
<script src="{{asset('micropluginjs/microplugin.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{url('template/js/selectize.js')}}" type="text/javascript" charset="utf-8"></script>

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
