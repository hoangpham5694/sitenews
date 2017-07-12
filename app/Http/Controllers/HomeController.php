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
        $featurePosts = Post::join('categories','posts.cate_id','=','categories.id')
        ->select('posts.title','posts.view','posts.image','posts.description','posts.tags','posts.created_at','posts.slug as post_slug','posts.id','categories.slug as cate_slug')
        ->where('posts.featured_at','!=',null)
        ->where('posts.status','=','active')->limit(4)->orderBy('featured_at','DESC')->get();
        
        $newestPosts =Post::join('categories','posts.cate_id','=','categories.id')
        ->select('posts.title','posts.view','posts.image','posts.description','posts.tags','posts.created_at','posts.slug as post_slug','posts.id','categories.slug as cate_slug')
        ->where('status','=','active')
        ->limit(2)->orderBy('created_at','DESC')->get();
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
    //    dd($cates);
        if(is_mobile()){
           return view('guests.mobile.index',['featurePosts'=>$featurePosts,'newestPosts'=>$newestPosts,'cates'=>$cates]); 
        }
        return view('guests.index',['featurePosts'=>$featurePosts,'newestPosts'=>$newestPosts,'cates'=>$cates]);
    }
    public function getListPosts($cateSlug, $id)
    {
       $cate = Category::findOrFail($id);
        if(is_mobile()){
           return view('guests.mobile.category',['cate'=>$cate]);
        }
       return view('guests.category',['cate'=>$cate]);
       
    }
    public function getDetailPost($cateSlug, $postSlug, $id)
    {
        $post = Post::join('categories','posts.cate_id','=','categories.id')
      ->select('posts.title','posts.content','posts.view','posts.image','posts.description','posts.tags','posts.created_at','posts.updated_at','posts.slug as post_slug','posts.id','categories.slug as cate_slug','categories.name as cate_name','categories.id as cate_id')
      ->findOrFail($id);
        $relatedPosts = Post::join('categories','posts.cate_id','=','categories.id')
      ->select('posts.title','posts.view','posts.image','posts.description','posts.tags','posts.created_at','posts.updated_at','posts.slug as post_slug','posts.id','categories.slug as cate_slug')
            ->where('posts.created_at','<=',date("Y-m-d") )
            ->where('posts.created_at','>=',date('Y-m-d',strtotime("-15 days")))
            ->inRandomOrder()
            ->limit(6)->get();
        if(is_mobile()){
            return view('guests.mobile.detail',['post'=>$post,'relatedPosts'=>$relatedPosts,'cateSlug'=>$cateSlug]);
        }
        return view('guests.detail',['post'=>$post,'relatedPosts'=>$relatedPosts,'cateSlug'=>$cateSlug]);
    }
    public function getSearchPost(Request $request)
    {
        $keyword ="";
        if($request->key != null){
           // dd($request->key);
            $keyword =$request->key;  
        }
        return view('guests.search',['keyword'=>$keyword]);
    }

}
