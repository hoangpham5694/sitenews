<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemPost;
use App\Http\Requests;

class SystemPostController extends Controller
{
    public function getSystemPostLisAdmin()
    {
    	return view('admins.systemposts.list');
    }
    public function getAddSystemPostAdmin()
    {
    	return view('admins.systemposts.add');
    }
    public function postAddSystemPostAdmin(Request $request)
    {
	    $post = new SystemPost();
	    $post->title= $request->txtTitle;
	    $post->slug = str_slug($request->txtTitle, "-");

	    $post->description = $request->txtDescription;
	    $post->content = $request->txtContent;
	    $post->save();
        $url="adminsites/systempost/detail/".$post->id;
   		return redirect($url)->with(['flash_level'=>'alert-success','flash_message' => 'Thêm bài viết thành công'] );
    }
    public function getSystemPostListAjax($max, $page,Request $request)
    {
	    $numberRecord = $max;
	  //  dd($page);
	    $vitri =($page -1 ) * $numberRecord;
	   // $orderBy = $request->orderby;
	    $key = $request->key;
	    $posts = SystemPost::select('title','description','created_at','slug','id')     
	      ->where('title','LIKE',"%".$key."%")
	      ->orderBy('created_at','DESC')
	      ->limit($numberRecord)
	      ->offset($vitri)
	      ->get();
	    return json_encode(['posts'=>$posts,'total'=>SystemPost::count()]);
    }
    public function getEditSystemPostAdmin($id)
    {
    	$systemPost = SystemPost::findOrFail($id);
    	return view('admins.systemposts.edit',['post'=>$systemPost]);
    }
    public function postEditSystemPostAdmin($id, Request $request)
    {
    	$post = SystemPost::findOrFail($id);
	    $post->title= $request->txtTitle;
	    $post->slug = str_slug($request->txtTitle, "-");

	    $post->description = $request->txtDescription;
	    $post->content = $request->txtContent;
	    $post->save();
	      $url="adminsites/systempost/detail/".$post->id;
   		return redirect($url)->with(['flash_level'=>'alert-success','flash_message' => 'Sửa bài viết thành công'] );
    }
    public function getDetailSystemPostAdmin($id)
    {
    	$systemPost = SystemPost::findOrFail($id);
    	return view('admins.systemposts.detail',['post'=>$systemPost]);
    }
    public function getDeleteSystemPostAjax($id)
    {
    	$post = SystemPost::findOrFail($id);
    	$post->delete();
    	return('Xóa bài viết thành công');
    }
}
