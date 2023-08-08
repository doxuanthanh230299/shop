<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
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

        $request->session()->flash('alert', 'Đã thêm thành công');
        return redirect('backend/users/adduser');
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::find($id)->toArray();
        return view('backend.users.edituser', ['user' => $user]);
    }
    public function update(EditUserRequest $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->email = $request->email;
        $user->fullname = $request->fullname;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->level = $request->level;

        $user->save();
        return redirect('/admin/user');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/user');
    }
}
