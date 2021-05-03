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
    public function registeredit(Request $request, $id)
    {
        $id = User::findOrFail($id);
        return view('admin.register-edit');
    }
}
