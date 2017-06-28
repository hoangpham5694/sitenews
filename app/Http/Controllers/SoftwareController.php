<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\System;
use App\Category;
use App\Software;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\User;
class SoftwareController extends Controller
{
	public function getListSoftwareManager()
    {
    	$systems = System::get();
    	$cates = Category::get();
    	$users = User::get();
        return view('managers.softwares.list',['cates'=>$cates,'systems'=>$systems,'users'=>$users]);
    }
   	public function getAddSoftwareManager()
   	{
   		$systems = System::get();
   		$cates = Category::get();
   		return view('managers.softwares.add',['systems'=>$systems,'cates'=>$cates]);
   	}
   	public function postAddSoftwareManager(Request $request)
   	{
   		$software = new Software();
   		$software->name= $request->txtName;
      $software->title= $request->txtTitle;
   		$software->slug = str_slug($request->txtName, "-");
   		$software->version = $request->txtVersion;
   		$software->size = $request->txtSize;
   		$software->system_require = $request->txtSysRequire;
   		$software->direct_link = $request->txtDirectLink;
   		$software->mirror_link1 = $request->txtMirrorLink1;
   		$software->mirror_link2 = $request->txtMirrorLink2;
   		$software->crack_link = $request->txtCrackLink;
   		$software->description = $request->txtDescription;
   		$software->content = $request->txtContent;
   		$software->system_id = $request->sltSystem;
   		$software->cate_id = $request->sltCate;
   		$software->publisher_name = $request->txtPublisherName;
   		$software->publisher_url = $request->txtPublisherUrl;
   		$software->status = "pending";
   		$software->tags = $request->txtTags;
   		$software->user_id = Auth::user()->id;
   		$file = $request->file('fileImage');
   		if(strlen($file) >0){
            $filename = str_slug($request->txtTitle, "-").'-'.time().'_'.$file->getClientOriginalName();
            $destinationPath = 'upload/images';
             $img = Image::make($file);
            $file->move($destinationPath,$filename);
         //   $img = Image::make($destinationPath.'/'.$filename);

            $img->resize(128, 128);
            $img->save($destinationPath.'/128x128/'.$filename);
            $img->resize(96, 96);
            $img->save($destinationPath.'/96x96/'.$filename);
            $img->resize(64, 64);
            $img->save($destinationPath.'/64x64/'.$filename);
            $img->resize(32, 32);
            $img->save($destinationPath.'/32x32/'.$filename);
            $software->image= $filename;
        }
        $software->save();
        $url="managersites/software/detail/".$software->id;
		return redirect($url)->with(['flash_level'=>'alert-success','flash_message' => 'Thêm video thành công'] );
   	}
   	public function getEditSoftwareManager($id)
   	{
   		$software = Software::findOrFail($id);
   		$systems = System::get();
   		$cates = Category::get();
   		return view('managers.softwares.edit',['software'=>$software,'systems'=>$systems,'cates'=>$cates]);
   	}
	 public function postEditSoftwareManager($id, Request $request)
   	{
   		$software = Software::findOrFail($id);
      $software->name= $request->txtName;
      $software->title= $request->txtTitle;
   		$software->slug = str_slug($request->txtName, "-");
   		$software->version = $request->txtVersion;
   		$software->size = $request->txtSize;
   		$software->system_require = $request->txtSysRequire;
   		$software->direct_link = $request->txtDirectLink;
   		$software->mirror_link1 = $request->txtMirrorLink1;
   		$software->mirror_link2 = $request->txtMirrorLink2;
   		$software->crack_link = $request->txtCrackLink;
   		$software->description = $request->txtDescription;
   		$software->content = $request->txtContent;
   		$software->system_id = $request->sltSystem;
   		$software->cate_id = $request->sltCate;
   		$software->publisher_name = $request->txtPublisherName;
   		$software->publisher_url = $request->txtPublisherUrl;
   		$software->status = "pending";
   		$software->tags = $request->txtTags;
   		$software->user_id = Auth::user()->id;
   		$file = $request->file('fileImage');
   		if(strlen($file) >0){
            $filename = str_slug($request->txtTitle, "-").'-'.time().'_'.$file->getClientOriginalName();
            $destinationPath = 'upload/images';
             $img = Image::make($file);
            $file->move($destinationPath,$filename);
         //   $img = Image::make($destinationPath.'/'.$filename);

            $img->resize(128, 128);
            $img->save($destinationPath.'/128x128/'.$filename);
            $img->resize(96, 96);
            $img->save($destinationPath.'/96x96/'.$filename);
            $img->resize(64, 64);
            $img->save($destinationPath.'/64x64/'.$filename);
            $img->resize(32, 32);
            $img->save($destinationPath.'/32x32/'.$filename);
            $software->image= $filename;
        }
        $software->save();
  		$url="managersites/software/detail/".$software->id;
		return redirect($url)->with(['flash_level'=>'alert-success','flash_message' => 'Sửa video thành công'] );

   	}



   	public function getDetailSoftwareManager($id)
   	{
   		$software = Software::join('users','users.id','=','softwares.user_id')
   		->join('categories','categories.id','=','softwares.cate_id')
   		->join('systems','systems.id','=','softwares.system_id')
   		->select('softwares.id','softwares.name','softwares.image','softwares.slug','softwares.description','softwares.system_require','softwares.version','softwares.size','softwares.content','softwares.downloaded','softwares.view','softwares.share','softwares.publisher_name','softwares.publisher_url','softwares.direct_link','softwares.mirror_link1','softwares.mirror_link2','softwares.crack_link','categories.name as cate_name','users.firstname as user_firstname','users.lastname as user_lastname','systems.name as system_name')
   		->findOrFail($id);
   		return view('managers.softwares.detail',['software'=>$software]);
   	}


  public function getDeleteSoftwareAjax($id)
    {
    	try{
    		DB::beginTransaction();
			$Software = Software::findOrFail($id);
			
    		$Software->delete();
    		DB::commit();
    		return "Xóa Software thành công";

    	}catch(Exception $e){
			DB::rollback();
			return "Lỗi trong quá trình thực hiện";
    	}
    }
    
  
   
    public function getRandomSoftwaresAjax($number)
    {
        $numberRecord = $number;
        $Software = Software::select('id','title','description','slug','view','share','image','url','duration','created_at')
        ->where('status','=','active')
        ->inRandomOrder()->limit($numberRecord)->offset(0)->get();;
        return json_encode($Software);
    }

    public function getNewSoftwaresAjax($number)
    {
        $numberRecord = $number;
        $Software = Software::select('id','title','description','slug','view','share','image','url','created_at')
        ->where('status','=','active')
        ->limit($numberRecord)->offset(0)->orderBy('id','DESC')->get();;
        return json_encode($Software);
    }
    public function getHotSoftwaresAjax($number)
    {
        $numberRecord = $number;

      //  $date = new DateTime();
     //   $date->add(DateInterval::createFromDateString('yesterday'));

      //  echo date("Y-m-d",strtotime("-30 days")) . "\n";

        $Software = Software::select('id','title','description','slug','view','share','image','url','created_at')
        ->where('status','=','active')
        ->where('created_at','>=',date("Y-m-d",strtotime("-30 days")))
        ->limit($numberRecord)->offset(0)->orderBy('view','DESC')->get();
        return json_encode($Software);
    }


    public function getSetStatusAjax($softwareid, $status)
    {
         $software = Software::findOrFail($softwareid);
         $software->status = $status;
         $software->save();
         return "Set status: ".$status;
    }



    public function getSoftwareListAjax(Request $request, $max, $page)
	{
		
    	$numberRecord= $max;
        $vitri =($page -1 ) * $numberRecord;
 		$cateId = $request->cateid;
 		$userId = $request->userid;
 		$sysId = $request->sysid;
    	$keyword = $request->key;
        $status = $request->status;
        if($cateId == ""){
            $cateId = null;
        }
        if($status == ""){
            $status = null;
        }
        if($sysId == ""){
            $sysId = null;
        }
        if($userId == ""){
            $userId = null;
        }

    	$softwares = Software::join('categories','categories.id','=','softwares.cate_id')
      	->join('systems','systems.id','=','softwares.system_id')
        ->join('users','users.id','=','softwares.user_id')
    	
    	->select('softwares.id','softwares.name','softwares.version','softwares.view','softwares.share','softwares.downloaded','softwares.image','categories.name as cate_name','users.firstname as user_firstname','users.lastname as user_lastname','systems.name as sys_name','softwares.status')
        ->where(function($query) use ($keyword){
            $query->where('softwares.name','LIKE','%'.$keyword.'%');
        })
        ->where('softwares.user_id','LIKE', $userId)
        ->where('softwares.system_id','LIKE', $sysId)
        ->where('softwares.cate_id','LIKE', $cateId)
        ->where('softwares.status','LIKE', $status)
    	->limit($numberRecord)->offset($vitri)    
    	->orderBy('softwares.id','DESC')	
    	->groupBy('softwares.id')
    	->get();
    	return json_encode($softwares);
	}
	public function getTotalSoftwareAjax()
	{
		return Software::count();
	}
  public function getMostDownloadSoftwareAjax($number=10)
  {
      $softwares = Software::select('name','view','downloaded','title','image','slug','id')
      ->where('status','=','active')
      ->orderBy('downloaded','DESC')
      ->limit($number)
      ->get();
      return json_encode($softwares);
  }
  public function getHighestViewSoftwareInSystemAjax($sysid=0)
  {
    if($sysid ==0){
      $softwares = Software::
      select('name','view','downloaded','title','version','image','description', 'system_require','tags','publisher_name','publisher_url','slug','id')
      ->where('status','=','active')

      ->orderBy('view','DESC')
       ->first();
      return json_encode($softwares);
    }
    $softwares = Software::
      select('name','view','downloaded','title','image','version','description', 'system_require','tags','publisher_name','publisher_url','slug','id')
      ->where('status','=','active')
      ->where('system_id','=',$sysid)
      ->orderBy('view','DESC')
      ->first();
      return json_encode($softwares);
  }
  public function getListNewestSoftwareAjax($offset=0,$max=10, Request $request)
  {
      $cateid= $request->cateid;
      $sysid = $request->sysid;
      if($cateid =="") $cateid=null;
      if($sysid =="") $sysid=null;
      $softwares = Software::select('name','view','downloaded','title','image','version','description', 'system_require','tags','publisher_name','publisher_url','slug','id')
      ->where('status','=','active')
      ->where('cate_id','LIKE',$cateid)
      ->where('system_id','LIKE',$sysid)
      ->orderBy('id','DESC')
      ->limit($max)
      ->offset($offset)
      ->get();
      return json_encode($softwares);
  }
  public function getListLastUpdateAjax($offset=0,$max=10,Request $request)
  {
      $cateid= $request->cateid;
      $sysid = $request->sysid;
      if($cateid =="") $cateid=null;
      if($sysid =="") $sysid=null;
      $softwares = Software::select('name','view','downloaded','title','image','version','description', 'system_require','tags','publisher_name','publisher_url','slug','id')
      ->where('status','=','active')
      ->where('cate_id','LIKE',$cateid)
      ->where('system_id','LIKE',$sysid)
      ->orderBy('updated_at','DESC')
      ->limit($max)
      ->offset($offset)
      ->get();
      return json_encode($softwares);
  }
  public function getListRandomAjax(Request $request, $max=10)
  {
    $cateid= $request->cateid;
    $sysid = $request->sysid;
    if($cateid =="") $cateid=null;
    if($sysid =="") $sysid=null;
    $software = Software::select('name','view','downloaded','title','image','version','description', 'system_require','tags','publisher_name','publisher_url','slug','id')
     ->where('status','=','active') 
    ->where('cate_id','LIKE',$cateid)
    ->where('system_id','LIKE',$sysid)
    ->inRandomOrder()
    ->limit($max)
    ->get();
    return json_encode($software);
  }
  public function getListSoftwareWithCateAjax( $max, $page,Request $request)
  {
    $numberRecord= $max;
    $vitri =($page -1 ) * $numberRecord;
    $orderBy = $request->orderby;
    $cateId = $request->cateid;
    $softwares = Software::select('name','view','downloaded','title','image','version','description', 'system_require','tags','publisher_name','publisher_url','slug','id')
      ->where('status','=','active')
      ->where('cate_id','=',$cateId)
      ->orderBy($orderBy,'DESC')
      ->limit($numberRecord)
      ->offset($vitri)
      ->get();
      return json_encode(['softwares'=>$softwares,'total'=>Software::where('status','=','active')
      ->where('cate_id','=',$cateId)->count()]);
  }
  
}
