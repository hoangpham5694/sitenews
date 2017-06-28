<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtfirstname' => 'required|min:3',
            'txtlastname' => 'required|min:3',
            'txtusername' => 'required|min:5|unique:users,username',
                        'txtpassword' => 'min:6',
            'txtrepassword' => 'same:txtpassword',
        ];
    }
    public function messages()
    {
    return [

        'txtfirstname.required'  => 'Vui lòng nhập tên',
        'txtlastname.required'  => 'Vui lòng nhập họ',
        'txtfirstname.min'  => 'Họ lót phải trên 3 kí tự',
        'txtlastname.min'  => 'Tên phải trên 3 kí tự',
        'txtusername.unique' => 'Tên đăng nhập đã bị trùng',
   'txtpassword.min'  => 'Mật khẩu phải trên 6 kí tự',
        'txtrepassword.same'  => 'Mật khẩu phải trùng nhau',

    ];
    }
}
