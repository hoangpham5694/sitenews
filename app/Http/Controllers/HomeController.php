<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\System;
use App\Post;
use App\Http\Requests;

class HomeController extends Controller
{
    public function __construct(){

    }
    public function getIndex()
    {
        $featurePosts = Post::select('title','slug','description','image')->where('featured_at','!=',null)->where('status','=','active')->limit(4)->orderBy('featured_at','DESC')->get();
        $newestPosts =Post::select('title','slug','description','image')->where('status','=','active')->limit(2)->orderBy('created_at','DESC')->get();
        // $posts = Post::select('title')->with(array('category'=>function($query){
        //     $query->select('name');
        // }))
        //  ->get();
        $cates = Category::where('main','=',1)->get();
        // foreach($cates as $cate){
        //     $cate->post= Post::get();
        // }
        // foreach($posts as $post){
        //     dd($post);
        // }
     /*   foreach($cates as $cate){
            $posts = $cate->posts();
            dd($posts->get());
        }
        */

       // $posts = $cate->posts()->get();
        //dd($cates);
        if(is_mobile()){
           return view('guests.mobile.index',['featurePosts'=>$featurePosts,'newestPosts'=>$newestPosts]); 
        }
        return view('guests.index',['featurePosts'=>$featurePosts,'newestPosts'=>$newestPosts,'cates'=>$cates]);
    }
    public function getListSoftwareSWithCate($cateslug, $cateid)
    {
       if(is_mobile()){
           return view('guests.mobile.list-software-with-cate',['cate'=>Category::findOrFail($cateid)]);
        }
    	return view('guests.list-software-with-cate',['cate'=>Category::findOrFail($cateid)]);
    }
    public function getListSoftwareSWithSystem($systemslug, $systemid)
    {
         if(is_mobile()){
           return view('guests.mobile.list-software-with-system',['system'=>System::findOrFail($systemid)]);
        }
    	return view('guests.list-software-with-system',['system'=>System::findOrFail($systemid)]);
    }
    public function getDetailSoftware($softwareslug,$softwareid)
    {
    	$software = Software::findOrFail($softwareid);
    	$arrTags = explode(",", $software->tags);
    	$keyword ="";
    	if(count($arrTags)>0 ){
    		$keyword = $arrTags[0];
    	}
    	//dd($keyword);
    	$suggestSoftwares = Software::select('name','id','title','image','slug','downloaded')
    	->where('status','=','active')
    	->where(function($query) use ($keyword){
            $query->where('name','LIKE','%'.$keyword.'%')
            ->orWhere('description','LIKE','%'.$keyword.'%')
            ->orWhere('content','LIKE','%'.$keyword.'%');
            })
    	->where('system_id','=',$software->system_id)
    	->where('id','!=',$software->id)
    	->limit(5)
    	->get();
  		//dd($suggestSoftwares);
        if(is_mobile()){
           return view('guests.mobile.software-detail',['software'=>$software,'suggestSoftwares'=>$suggestSoftwares]);
        }

    	return view('guests.software-detail',['software'=>$software,'suggestSoftwares'=>$suggestSoftwares]);
    }
    public function getDownloadSoftware($softwareslug,$softwareid)
    {
    	$software = Software::select('name','id','title','image','size','version','direct_link','mirror_link1','mirror_link2','crack_link','publisher_name','publisher_url','updated_at','downloaded','system_require')->findOrFail($softwareid);
        $software->downloaded = $software->downloaded+1;
        $software->save();
    	$arrTags = explode(",", $software->tags);
    	$keyword ="";
    	if(count($arrTags)>0 ){
    		$keyword = $arrTags[0];
    	}
    	//dd($keyword);
    	$suggestSoftwares = Software::select('name','id','title','image','slug','downloaded')
    	->where('status','=','active')
    	->where(function($query) use ($keyword){
            $query->where('name','LIKE','%'.$keyword.'%')
            ->orWhere('description','LIKE','%'.$keyword.'%')
            ->orWhere('content','LIKE','%'.$keyword.'%');
            })
    	->where('system_id','=',$software->system_id)
    	->where('id','!=',$software->id)
    	->limit(5)
    	->get();
  		//dd($suggestSoftwares);
        if(is_mobile()){
            return view('guests.mobile.download',['software'=>$software,'suggestSoftwares'=>$suggestSoftwares]);
        }
    	return view('guests.download',['software'=>$software,'suggestSoftwares'=>$suggestSoftwares]);
    }
    public function getSearchSoftware(Request $request)
    {
        $max =10;
        $key="";
        $page=1;
        //$system ="";

        if($request->key != ""){
            $key = $request->key;
        }
        if($request->page != ""){
            $page = $request->page;
        }
        if($request->system != ""){
            $system = $request->system;
        }else{
            $system=null;
        }      

        $numberRecord= $max;
        $vitri =($page -1 ) * $numberRecord; 

        $softwares = Software::join('systems','systems.id','=','softwares.system_id')
        ->select('softwares.id','softwares.name','softwares.title','softwares.slug','softwares.downloaded','systems.name as system_name','softwares.publisher_name','softwares.publisher_url','softwares.size','softwares.version','softwares.system_require','softwares.image','softwares.tags','softwares.description')
        ->where('softwares.status','=','active')
        ->where(function($query) use ($key){
            $query->where('softwares.name','LIKE','%'.$key.'%')
             ->orWhere('softwares.description','LIKE','%'.$key.'%')
            ->orWhere('softwares.tags','LIKE','%'.$key.'%')
            ->orWhere('softwares.content','LIKE','%'.$key.'%');
        })
        ->where('systems.name','LIKE',$system)
        ->limit($numberRecord)
        ->offset($vitri)
        ->orderBy('systems.id','DESC')
        ->get();

        $totalSoftwares = Software::join('systems','systems.id','=','softwares.system_id')
        ->select('softwares.id','softwares.name','softwares.title','softwares.slug','softwares.downloaded','systems.name as system_name','softwares.size','softwares.version','softwares.system_require')
        ->where('softwares.status','=','active')
        ->where(function($query) use ($key){
            $query->where('softwares.name','LIKE','%'.$key.'%')
            ->orWhere('softwares.description','LIKE','%'.$key.'%')
            ->orWhere('softwares.tags','LIKE','%'.$key.'%')
            ->orWhere('softwares.content','LIKE','%'.$key.'%');
        })
        ->where('systems.name','LIKE',$system)
        ->count();
        $total = $totalSoftwares /$max +1;
        if(is_mobile()){
           return view('guests.mobile.search',['softwares'=>$softwares,'total'=>(int)$total,'page'=>$page,'key'=>$key,'system'=>$system]); 
        }
        return view('guests.search',['softwares'=>$softwares,'total'=>(int)$total,'page'=>$page,'key'=>$key,'system'=>$system]);

      //  dd($softwares);

    }   
}
