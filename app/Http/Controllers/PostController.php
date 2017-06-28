<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{
  public function getListPostManager()
    {

      $cates = Category::get();
      $users = User::get();
        return view('managers.post.list',['cates'=>$cates,'users'=>$users]);
    }
    public function getAddPostManager()
    {

      $cates = Category::get();
      return view('managers.posts.add',['cates'=>$cates]);
    }
    public function postAddPostManager(Request $request)
    {
      $post = new Post();

      $post->title= $request->txtTitle;
      $post->slug = str_slug($request->txtName, "-");

      $post->description = $request->txtDescription;
      $post->content = $request->txtContent;
      $post->cate_id = $request->sltCate;
      $post->status = "pending";
      $post->tags = $request->txtTags;
      $post->user_id = Auth::user()->id;
      $file = $request->file('fileImage');
      if(strlen($file) >0){
            $filename = str_slug($request->txtTitle, "-").'-'.time().'_'.$file->getClientOriginalName();
            $destinationPath = 'upload/images/posts';
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
            $post->image= $filename;
        }
        $post->save();
        $url="managersites/post/detail/".$post->id;
    return redirect($url)->with(['flash_level'=>'alert-success','flash_message' => 'Thêm bài viết thành công'] );
    }
    public function getEditPostManager($id)
    {
      $post = Post::findOrFail($id);

      $cates = Category::get();
      return view('managers.posts.edit',['post'=>$post,'cates'=>$cates]);
    }
   public function postEditPostManager($id, Request $request)
    {
      $post = Post::findOrFail($id);
      $post->title= $request->txtTitle;
      $post->slug = str_slug($request->txtName, "-");
      $post->description = $request->txtDescription;
      $post->content = $request->txtContent;
      $post->cate_id = $request->sltCate;
      $post->status = "pending";
      $post->tags = $request->txtTags;
      $post->user_id = Auth::user()->id;
      $file = $request->file('fileImage');
      if(strlen($file) >0){
            $filename = str_slug($request->txtTitle, "-").'-'.time().'_'.$file->getClientOriginalName();
            $destinationPath = 'upload/images/posts';
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
            $post->image= $filename;
        }
        $post->save();
      $url="managersites/post/detail/".$post->id;
    return redirect($url)->with(['flash_level'=>'alert-success','flash_message' => 'Sửa bài viết thành công'] );

    }



    public function getDetailPostManager($id)
    {
      $post = Post::join('users','users.id','=','posts.user_id')
      ->join('categories','categories.id','=','posts.cate_id')

      ->select('posts.id','posts.name','posts.image','posts.slug','posts.description','posts.version','posts.size','posts.content','posts.downloaded','posts.view','posts.share','posts.publisher_name','posts.publisher_url','posts.direct_link','posts.mirror_link1','posts.mirror_link2','posts.crack_link','categories.name as cate_name','users.firstname as user_firstname','users.lastname as user_lastname')
      ->findOrFail($id);
      return view('managers.posts.detail',['post'=>$post]);
    }


  public function getDeletePostAjax($id)
    {
      try{
        DB::beginTransaction();
      $Post = Post::findOrFail($id);

        $Post->delete();
        DB::commit();
        return "Xóa Post thành công";

      }catch(Exception $e){
      DB::rollback();
      return "Lỗi trong quá trình thực hiện";
      }
    }



    public function getRandomPostsAjax($number)
    {
        $numberRecord = $number;
        $Post = Post::select('id','title','description','slug','view','share','image','url','duration','created_at')
        ->where('status','=','active')
        ->inRandomOrder()->limit($numberRecord)->offset(0)->get();;
        return json_encode($Post);
    }

    public function getNewPostsAjax($number)
    {
        $numberRecord = $number;
        $Post = Post::select('id','title','description','slug','view','share','image','url','created_at')
        ->where('status','=','active')
        ->limit($numberRecord)->offset(0)->orderBy('id','DESC')->get();;
        return json_encode($Post);
    }
    public function getHotPostsAjax($number)
    {
        $numberRecord = $number;

      //  $date = new DateTime();
     //   $date->add(DateInterval::createFromDateString('yesterday'));

      //  echo date("Y-m-d",strtotime("-30 days")) . "\n";

        $Post = Post::select('id','title','description','slug','view','share','image','url','created_at')
        ->where('status','=','active')
        ->where('created_at','>=',date("Y-m-d",strtotime("-30 days")))
        ->limit($numberRecord)->offset(0)->orderBy('view','DESC')->get();
        return json_encode($Post);
    }


    public function getSetStatusAjax($postid, $status)
    {
         $post = Post::findOrFail($postid);
         $post->status = $status;
         $post->save();
         return "Set status: ".$status;
    }



    public function getPostListAjax(Request $request, $max, $page)
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

      $posts = Post::join('categories','categories.id','=','posts.cate_id')

        ->join('users','users.id','=','posts.user_id')

      ->select('posts.id','posts.name','posts.version','posts.view','posts.share','posts.downloaded','posts.image','categories.name as cate_name','users.firstname as user_firstname','users.lastname as user_lastname','posts.status')
        ->where(function($query) use ($keyword){
            $query->where('posts.name','LIKE','%'.$keyword.'%');
        })
        ->where('posts.user_id','LIKE', $userId)

        ->where('posts.cate_id','LIKE', $cateId)
        ->where('posts.status','LIKE', $status)
      ->limit($numberRecord)->offset($vitri)
      ->orderBy('posts.id','DESC')
      ->groupBy('posts.id')
      ->get();
      return json_encode($posts);
  }
  public function getTotalPostAjax()
  {
    return Post::count();
  }
  public function getMostDownloadPostAjax($number=10)
  {
      $posts = Post::select('name','view','downloaded','title','image','slug','id')
      ->where('status','=','active')
      ->orderBy('downloaded','DESC')
      ->limit($number)
      ->get();
      return json_encode($posts);
  }
  public function getHighestViewPostInSystemAjax($sysid=0)
  {
    if($sysid ==0){
      $posts = Post::
      select('name','view','downloaded','title','version','image','description','tags','publisher_name','publisher_url','slug','id')
      ->where('status','=','active')

      ->orderBy('view','DESC')
       ->first();
      return json_encode($posts);
    }
    $posts = Post::
      select('name','view','downloaded','title','image','version','description','tags','publisher_name','publisher_url','slug','id')
      ->where('status','=','active')

      ->orderBy('view','DESC')
      ->first();
      return json_encode($posts);
  }
  public function getListNewestPostAjax($offset=0,$max=10, Request $request)
  {
      $cateid= $request->cateid;
      $sysid = $request->sysid;
      if($cateid =="") $cateid=null;
      if($sysid =="") $sysid=null;
      $posts = Post::select('name','view','downloaded','title','image','version','description','tags','publisher_name','publisher_url','slug','id')
      ->where('status','=','active')
      ->where('cate_id','LIKE',$cateid)

      ->orderBy('id','DESC')
      ->limit($max)
      ->offset($offset)
      ->get();
      return json_encode($posts);
  }
  public function getListLastUpdateAjax($offset=0,$max=10,Request $request)
  {
      $cateid= $request->cateid;
      $sysid = $request->sysid;
      if($cateid =="") $cateid=null;
      if($sysid =="") $sysid=null;
      $posts = Post::select('name','view','downloaded','title','image','version','description','tags','publisher_name','publisher_url','slug','id')
      ->where('status','=','active')
      ->where('cate_id','LIKE',$cateid)

      ->orderBy('updated_at','DESC')
      ->limit($max)
      ->offset($offset)
      ->get();
      return json_encode($posts);
  }
  public function getListRandomAjax(Request $request, $max=10)
  {
    $cateid= $request->cateid;
    $sysid = $request->sysid;
    if($cateid =="") $cateid=null;
    if($sysid =="") $sysid=null;
    $post = Post::select('name','view','downloaded','title','image','version','description','tags','publisher_name','publisher_url','slug','id')
     ->where('status','=','active')
    ->where('cate_id','LIKE',$cateid)

    ->inRandomOrder()
    ->limit($max)
    ->get();
    return json_encode($post);
  }
  public function getListPostWithCateAjax( $max, $page,Request $request)
  {
    $numberRecord= $max;
    $vitri =($page -1 ) * $numberRecord;
    $orderBy = $request->orderby;
    $cateId = $request->cateid;
    $posts = Post::select('name','view','downloaded','title','image','version','description','tags','publisher_name','publisher_url','slug','id')
      ->where('status','=','active')
      ->where('cate_id','=',$cateId)
      ->orderBy($orderBy,'DESC')
      ->limit($numberRecord)
      ->offset($vitri)
      ->get();
      return json_encode(['posts'=>$posts,'total'=>Post::where('status','=','active')
      ->where('cate_id','=',$cateId)->count()]);
  }

}
