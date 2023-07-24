<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::orderBy("id", "DESC")->paginate(20);
        return view('backend.users.listuser', ['users' => $users]);
    }
    public function create()
    {
        return view('backend.users.adduser');
    }
    public function store(AddUserRequest $request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->fullname = $request->fullname;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->level = $request->level;
        $user->save();

        $request->session()->flash('alert','Đã thêm thành công');
        return redirect('backend/users/adduser');
    }
    public function edit()
    {
        return view('backend.users.edituser');
    }
    public function update()
    {
        return view('backend.users.edituser');
    }
}
