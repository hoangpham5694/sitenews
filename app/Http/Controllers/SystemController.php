<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\System;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
class SystemController extends Controller
{
     public function getSystemList()
    {
    	return view('admins.systems.list');
    }
    public function getSystemListAjax(Request $request,$max, $page)
    {
    	$numberRecord= $max;
        $vitri =($page -1 ) * $numberRecord;
    	$systems = System::leftJoin('softwares','softwares.system_id','=','systems.id')
    	->select('systems.id','systems.name','systems.slug',DB::raw('count(softwares.id) as count_softs'))
    //	->where('agencies.status','=','active')
    //	->where('courses.status','!=','delete')
    	->groupBy('systems.id')
    	->limit($numberRecord)->offset($vitri)    	
    	->get();
    	return $systems;
    }
    public function getTotalSystemAjax()
    {
    	return System::select('id')->count();
    }
    public function getAddSystemAjax(Request $request)
    {
    	$sys = new System();
    	$sys->name = $request->sysname;
        $sys->slug =str_slug($request->sysname, "-");
        if(System::where('slug','=',$sys->slug)->count()>0){
            return "Hệ điều hành này đã tồn tại";
        }
    	$sys->save();
    	return "Thêm Hệ điều hành thành công";
    }
    public function getEditSystemAjax(Request $request)
    {
    	$sys = System::findOrFail($request->sysid);
    	$sys->name = $request->sysname;
        $sys->slug =str_slug($request->sysname, "-");
    	$sys->save();
    	return "Sửa hệ điều hành thành công";
    }
    public function getDeleteSystemAjax($id)
    {
    	
    	try{
    		DB::beginTransaction();
			$sys = System::findOrFail($id);
		//	$s = VideoCate::where('cate_id','=',$id)->delete();
		//	dd($videoCates);
    		$sys->delete();
    		DB::commit();
    		return "Xóa hệ điều hành thành công";

    	}catch(Exception $e){
			DB::rollback();
			return "Lỗi trong quá trình thực hiện";
    	}
    }
    public function getListSystemSimpleAjax()
    {
        $systems = System::select('name','slug','id')->get();
        return json_encode($systems);
    }
}
