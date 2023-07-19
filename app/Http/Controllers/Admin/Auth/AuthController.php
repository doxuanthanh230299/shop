<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
        return view('/backend/login');
    }
    public function postLogin(Request $request)
    {
        $rules = [
            'email' => "email|required",
            'password' => 'required|min:3|max:6'
        ];
        $messages = [
            "email.email" => "Email không hợp lệ",
            "email.required" => "Email không được để trống",
            "password.required" => 'Password không được để trống',
            "password.min" => 'Password tối thiểu 3 kí tự',
            "password.max" => 'Password tối đa 6 kí tự',
        ];
        $request->validate($rules, $messages);
        // return view('/backend/login', );
        if ($request->email == "dothanh23021999@gmail.com" && $request->password == '123456') {
            $request->session()->put("email", $request->email);
            return redirect('/admin');
        } else {
            return redirect()->back()->withErrors('Tài khoản không hợp lệ');
        }
    }
}
