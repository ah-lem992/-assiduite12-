<?php

namespace App\Http\Controllers\Admin;

use App\Cour;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLessonRequest;
use App\Http\Requests\seanceRequest;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Prof;
use App\Salle;
use App\Seance;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeanceController extends Controller
{
    public function index()
    {

        $seances = Seance::all();

        return view('admin\seance.index', compact('seances'));
    }
    public function create()
    {
        $cours = Cour::all();
        $profs = Prof::all();
        $salles = Salle::all();
        return view('admin\seance.create', compact('cours','profs','salles'));
       // return view('admin\prof.create');

    }
    public function store(seanceRequest $request)
    {

      $seance =new Seance([
        "cour_id" => $request->get("cour_id"),
        "type" => $request->get("type"),
        "prof_id" => $request->get("prof_id"),
        "salle_id" => $request->get("salle_id"),
        "day" => $request->get("day"),
        "start_time" => $request->get("start_time"),
        "end_time" => $request->get("end_time")
    ]);

        $seance->save();
        session()->flash('success','ajout réussi');
        return redirect('seance');

    }
    public function edit($id)
    {
       /* $profs = Prof::all();
        $cour = Cour::find($prof_id);
        return view('admin.prof.edit', compact('cour', 'profs'));*/
        $cours = Cour::all();
        $profs = Prof::all();
        $salles = Salle::all();
        $seance = Seance::find($id);

        return view('admin.seance.edit', compact('cours', 'profs','salles','seance'));
    }

    public function destroy(Request $request, $id)
    {
        //return $request->all();
        $seance = Seance::find($id);

        $seance->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('seance')->with("status", "l'annee a etais crée ");
    }


}
