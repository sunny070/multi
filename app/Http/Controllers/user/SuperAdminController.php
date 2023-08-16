<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard(){
        return view('users.superadmin.dashboard');
    }

    public function users()
    {
        $users = User::with('roles')->where('role','!=',1)->get();
        return view('users.superadmin.users', compact('users'));
    }

    public function manageRole()
    {
        $users = User::where('role','!=',1)->get();
        $roles = Role::all();
        return view('users.superadmin.managerole', compact(['users','roles']));
    }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back();
    }
}
