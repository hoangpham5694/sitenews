<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getCateList()
    {
    	return view('admins.categories.list');
    }
    public function getCateListAjax(Request $request,$max, $page)
    {
    	$numberRecord= $max;
      //  dd($numberRecord);
        $vitri =($page -1 ) * $numberRecord;
    	$cates = Category::leftJoin('posts','posts.cate_id','=','categories.id')
    	->select('categories.id','categories.name','categories.slug','categories.description',DB::raw('count(posts.id) as count_posts'))
    //	->where('agencies.status','=','active')
    //	->where('courses.status','!=','delete')
    	->groupBy('categories.id')
    	->limit($numberRecord)->offset($vitri)
    	->get();
    	return $cates;
    }
    public function getTotalCategoriesAjax()
    {
    	return Category::select('id')->count();
    }
    public function getAddCateAjax(Request $request)
    {
    	$cate = new Category();
    	$cate->name = $request->catename;
        $cate->description = $request->catedes;
        $cate->slug =str_slug($request->catename, "-");
        if(Category::where('slug','=',$cate->slug)->count()>0){
            return "Danh mục đã tồn tại";
        }
    	$cate->save();
    	return "Thêm danh mục thành công";
    }
    public function getEditCateAjax(Request $request)
    {
    	$cate = Category::findOrFail($request->cateid);
    	$cate->name = $request->catename;
        $cate->description = $request->catedes;
        $cate->slug =str_slug($request->catename, "-");
    	$cate->save();
    	return "Sửa danh mục thành công";
    }
    public function getDeleteCateAjax($id)
    {

    	try{
    		DB::beginTransaction();
			$cate = Category::findOrFail($id);
		//	$s = VideoCate::where('cate_id','=',$id)->delete();
		//	dd($videoCates);
        $countPosts = Post::where('cate_id','=',$id)->count();
        if($countPost>0){
          $cate->delete();
          DB::commit();
          return "Xóa danh mục thành công";
        }
        return "Danh mục này vẫn còn bài viết";

    	}catch(Exception $e){
			DB::rollback();
			return "Lỗi trong quá trình thực hiện";
    	}
    }
    public function getListCateAjax()
    {
        $cates = Category::get();
        return json_decode($cates);
    }


}
