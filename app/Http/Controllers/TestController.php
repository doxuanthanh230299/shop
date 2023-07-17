<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function test()
    {
        $data = [
            "course1" => "PHP",
            "course2" => "ReactJs",
            "course3" => "NodeJs",
            "course4" => "Laravel",
        ];
        return view('test', $data);
    }
}
