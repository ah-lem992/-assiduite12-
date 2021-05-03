<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('users', $users);
    }
    public function registeredit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.register-edit', ['users' => $users]);
    }
    public function registerupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->save();
        return redirect('/role-register')->with("status", "vos informations sont enregistré");
    }
    public function registerdelete(Request $request, $id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/role-register')->with("danger", "vos informations sont supprimé");
    }
}
