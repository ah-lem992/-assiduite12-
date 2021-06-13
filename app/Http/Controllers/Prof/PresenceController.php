<?php

namespace App\Http\Controllers\Prof;

use App\Cour;
use App\Etudiant;
use App\Http\Controllers\Controller;
use App\Presence;
use App\Prof;
use App\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\EventListener\SaveSessionListener;

class PrController extends Controller
{
    public function index()
    {
        return 'hi';

        // $presences = Presence::all();
        //$presences = Presence::where('prof_id' , \Auth::id())->get();
        dd(Auth::id());

        return view('profeseur.presences.index', compact('presences'));
    }

    public function create()
    {
        //   $etudiants = Etudiant::all();
        $seances = Seance::all();
        $profs = Prof::all();
        $etudiants = Etudiant::all();
        return view('profeseur.presences.create', compact('etudiants', 'profs', 'seances'));
    }
    public function store(Request $request)
    {

        $presence = new Presence();

        // $presence->prof_id== Auth::user()->prof_id;

        $presence->id = $request->input("id");
        $presence->prof_id = $request->input("prof_id");
        $presence->etud_id = $request->input("etud_id");

        $presence->save();
        return redirect('presences');
    }
    public function edit($presence_id)
    {
        $etudiants = Etudiant::all();
        $seances = Seance::all();
        $presence = Presence::find($presence_id);
        return view('profeseur.presences.edit', compact('seances', 'etudiants', 'presence'));
    }

    public function update(Request $request, $presence_id)
    {
        $presence = Presence::find($presence_id);
        $presence->prof_id = Auth::user()->prof_id;
        $presence->etud_id = $request->input('etud_id');
        $presence->id = $request->input('id');
        $presence->save();
        return redirect('presences')->with("status", "l'annee a etais crée ");
    }
    public function destroy(Request $request, $presence_id)
    {
        //return $request->all();
        $presence = Presence::find($presence_id);

        $presence->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('presences')->with("status", "l'annee a etais crée ");
    }
}
