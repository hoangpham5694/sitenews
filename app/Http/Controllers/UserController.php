<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use App\Video;
use Illuminate\Support\Facades\DB;
use Hash;

class UserController extends Controller
{
    public function getUserList()
    {
    	return view('admins.users.list');
    }
    public function getListUserAjax(Request $request, $max, $page)
	{
		
    	$numberRecord= $max;
        $vitri =($page -1 ) * $numberRecord;
 		$orderBy = $request->orderby;
 		$sort = $request->sort;
    	$keyword = $request->key;


    	$users = User::leftJoin('softwares','users.id','=','softwares.user_id')
    	->select('users.id','users.username','users.firstname','users.lastname','users.level',DB::raw('count(softwares.id) as count_softs'))
        ->where(function($query) use ($keyword){
            $query->where('username','LIKE','%'.$keyword.'%')
            ->orWhere('firstname','LIKE','%'.$keyword.'%')
            ->orWhere('lastname','LIKE','%'.$keyword.'%');
        })
        ->groupBy('users.id')
    	->limit($numberRecord)->offset($vitri)    
    	->orderBy($orderBy,$sort)	

    	->get();
    	return $users;
	}
	public function getTotalUserAjax()
	{
		return User::count();
	}
	public function getDeleteUserAjax($id)
	{
		$user = User::findOrFail($id);
		$softwares = Software::where('user_id','=',$user->id)->count();
		if($softwares >0){
			return "Không thể xóa User này";
		}
		$user->delete();
		return "Xóa user thành công";
	}

    public function getUserAdd()
    {
        return view('admins/users/add');
    }
    public function getCheckUniqueUserAjax($username = "")
    {
        if($username == "") return "false";
        $users = User::where('username','=',$username)->count();
        if($users >0){
            return 'false';
        }
        return 'true';
    }
    public function postUserAdd(AddUserRequest $request)
    {
        $user = new User();
        $user->username = $request->txtusername;
        $user->firstname = $request->txtfirstname;
        $user->lastname = $request->txtlastname;
     
        $user->level = $request->selectrole;
        $user->password = Hash::make($request->txtpassword);
        $user->status = "active";
        $user->save();
        return redirect('adminsites/user/list')->with(['flash_level'=>'alert-success','flash_message' => 'Thêm nhân viên thành công'] );
    }
    public function getUserEdit($id)
    {
        $user= User::findOrFail($id);
        return view('admins/users/edit',['user'=>$user]);

    }
    public function postUserEdit($id, EditUserRequest $request)
    {
        $user = User::findOrFail($id);
        $user->firstname = $request->txtfirstname;
        $user->lastname = $request->txtlastname;

        $user->level = $request->selectrole;

        if($request->txtpassword != null){
            $user->password = Hash::make($request->txtpassword);
        }
        $user->save();
        return redirect('adminsites/user/list')->with(['flash_level'=>'alert-success','flash_message' => 'Sửa nhân viên thành công'] );
    }

}
