<?php

namespace App\Http\Controllers\Prof;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Presence;
use App\Prof;
use App\Seance;
use App\Cour;
use App\Etudiant;
use App\Groupe;
use App\Http\Requests\presenceRequest;

class PresenceController extends Controller
{
    public function index()
    {
        //   return 'hi';
        $presences = Presence::where('prof_id', \Auth::id())->get();

        //  dd(Auth::id());

        return view('profeseur.presences.index', compact('presences'));
    }
    public function create()
    {
        //   $etudiants = Etudiant::all();

        $groupes = Groupe::all();
        $seances = Seance::all();
        $profs = Prof::all();
        $etudiants = Etudiant::all();
        return view('profeseur.presences.create', compact( 'groupes','etudiants', 'profs', 'seances'));
    }
    public function store(presenceRequest $request)
    {
        //dd(now());
           foreach($request['etudiants_ids'] as $shtid) {
            $presence = Presence::create([
                'prof_id' => \Auth::id(),
                'id' => $request->get('id'),
                'etud_id' => $shtid
            ]);
        }

        $presence->groupe_id = $request->input('groupe_id');
        $presence->save();


        return redirect('/profs/presences');
    }
    public function edit($presence_id)
    {
        $presence = Presence::find($presence_id);
        $etudiants = Etudiant::all();
        $seances = Seance::all();
        $groupes= Groupe::all();

        return view('profeseur.presences.edit', compact('seances', 'etudiants', 'presence','groupes'));
    }

    public function update(Request $request, $presence_id)
    {
        $presence = Presence::find($presence_id);
        // $presence->prof_id = Auth::user()->prof_id;
        //  $presence->etud_id = $request->input('etud_id');
        $presence->id = $request->input('id');
        $presence->save();
        if ($request->has('etudiants_ids')) {
            foreach ($request['etudiants_ids'] as $etud_id) {

                $presence->etudiants()->associate($request->etudiants_ids);
            }
        }

        return redirect('/profs/presences')->with("status", "l'annee a etais crée ");
    }
    public function destroy(Request $request, $presence_id)
    {
        //return $request->all();
        $presence = Presence::find($presence_id);

        $presence->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('/profs/presences')->with("status", "l'annee a etais crée ");
    }
}
