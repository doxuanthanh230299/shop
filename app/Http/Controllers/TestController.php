<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Slug;

class TestController extends Controller
{
    //
    public function test()
    {
        Slug::getSlug('á à a');
    }

    public function test2(Request $request)
    {
        $request->session()->flash("alert", "Do Thanh");
    }

    public function test1(Request $request)
    {
        $rules = [
            "email" => "required|email",
            "password" => "required|min:3|max:6"
        ];
        $messages = [
            "email.required" => "Email không được để trống!",
            "email.email" => "Email không hợp lệ",
            "password.min" => "Password ít nhất 3 kí tự",
            "password.max" => "Password nhiều nhất 6 kí tự",
        ];
        $request->validate($rules, $messages);
    }
}
