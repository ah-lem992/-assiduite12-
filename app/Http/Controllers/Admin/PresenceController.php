<?php

namespace App\Http\Controllers\Admin;

use App\Cour;
use App\Etudiant;
use App\Http\Controllers\Controller;
use App\Presence;
use App\Prof;
use App\Seance;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\EventListener\SaveSessionListener;

class PresenceController extends Controller
{
    public function index()
    {

        $presences = Presence::all();

        return view('admin.presence.index', compact('presences'));
    }
    public function create()
    {
     //   $etudiants = Etudiant::all();
        $profs = Prof::all();
        $seances = Seance::all();
        $etudiants = Etudiant::all();
        return view('admin.presence.create', compact('etudiants','profs','seances'));


    }
    public function store(Request $request)
    {
      $presence =new Presence([

        "prof_id" => $request->get("prof_id"),

        "id" => $request->get("id"),

        "etud_id" => $request->get("etud_id"),



    ]);
     /*   $presence = $request->all();

            $presence['etudiants_ids'] = $request->input('etudiants_ids');

            Presence::create($presence);*/
             return redirect('presence');

    }
    public function destroy(Request $request, $presence_id)
    {
        //return $request->all();
        $presence = Presence::find($presence_id);

        $presence->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('presence')->with("status", "l'annee a etais crée ");
    }
}
