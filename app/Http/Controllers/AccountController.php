<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Auth;
use Hash;
class AccountController extends Controller
{
    public function getEditProfile()
    {
    	$user = User::findOrFail(Auth::user()->id);

    	return view('admins.accounts.edit',['user'=>$user]);
    }
    public function postEditProfile(EditUserRequest $request)
    {
       $user = User::findOrFail(Auth::user()->id);
        $user->firstname = $request->txtfirstname;
        $user->lastname = $request->txtlastname;

      

        if($request->txtpassword != null){
            $user->password = Hash::make($request->txtpassword);
        }
        $user->save();
        return redirect('adminsites/account/edit-profile')->with(['flash_level'=>'alert-success','flash_message' => 'Sửa thông tin thành công'] );
    }
}
