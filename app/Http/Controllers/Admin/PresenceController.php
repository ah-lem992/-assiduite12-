<?php

namespace App\Http\Controllers\Admin;

use App\Etudiant;
use App\Http\Controllers\Controller;
use App\Presence;
use App\Prof;
use App\Seance;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function index()
    {

        $presences = Presence::all();

        return view('admin\presence.index', compact('presences'));
    }
    public function create()
    {
     //   $etudiants = Etudiant::all();
        $profs = Prof::all();
        $seances = Seance::all();
        $etudiants = Etudiant::all();
        return view('admin\presence.create', compact('etudiants','profs','seances'));


    }
    public function store(Request $request)
    {
      $presence =new Presence([

        "prof_id" => $request->get("prof_id"),

        "id" => $request->get("id"),

        "etud_id" => $request->get("etud_id"),



    ]);

        $presence->save();
        return redirect('presence');

    }

}
