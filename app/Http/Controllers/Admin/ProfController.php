<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfController extends Controller
{
    public function index()
    {
        $prof = DB::table('teachers');
        return view('admin.teacher.index', ['profs' => $prof]);
    }
    public function create()
    {
        return view('admin\teacher.create');
    }
    public function store(Request $request)
    {
        $teacher = new Teacher();
        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        $teacher->nom = $request->input('nom');
        $teacher->usertype = $request->input('usertype');
        $teacher->grade = $request->input('grade');
        $teacher->save();
        // session()->flash('success', 'année  a étè bien crée');
        return redirect('prof')->with("status", "prof ajouté avec succés ");;
    }
}
