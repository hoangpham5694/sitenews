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
        $featurePosts = Post::select('title','slug','description','image','created_at')->where('featured_at','!=',null)->where('status','=','active')->limit(4)->orderBy('featured_at','DESC')->get();
        $newestPosts =Post::select('title','slug','description','image','created_at')->where('status','=','active')->limit(2)->orderBy('created_at','DESC')->get();
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
    public function getDetailPost($id)
    {
        return view('guests.detail');
    }
}
