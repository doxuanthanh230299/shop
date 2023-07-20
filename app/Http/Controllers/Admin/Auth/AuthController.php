<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
        return view('/backend/login');
    }
    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(
            [
                "email" => $request->email,
                "password" => $request->password
            ]
        )) {
            $request->session()->put("email", $request->email);
            return redirect('/admin');
        } else {
            return redirect()->back()->withErrors('Tài khoản không hợp lệ');
        }
    }
}
