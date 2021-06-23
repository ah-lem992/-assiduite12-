<?php

namespace App\Http\Controllers\Admin;

use App\Cour;
use App\Groupe;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLessonRequest;
use App\Http\Requests\seanceRequest;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Prof;
use App\Promo;
use App\Salle;
use App\Seance;
use App\Specialite;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Symfony\Component\HttpFoundation\Response;

class SeanceController extends Controller
{
    public function index()
    {

        $seances = Seance::all();
        //  dd($seances);

        return view('admin\seance.index', compact('seances'));
    }
    public function create()
    {

        $promos = Promo::all();
        $specialites = Specialite::all();
        $groupes = Groupe::all();
        $cours = Cour::all();
        $profs = Prof::all();
        $salles = Salle::all();
        return view('admin\seance.create', compact('specialites' ,'groupes','cours','profs','salles','promos'));
       // return view('admin\prof.create');

    }
    public function store(seanceRequest $request)
    {

      $seance =new Seance([
        "promo_id" => $request->get("promo_id"),
        "specialite_id" => $request->get("specialite_id"),
        "groupe_id" => $request->get("groupe_id"),
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
        $seance = Seance::find($id);
        $promos =Promo::all();
        $specialites = Specialite::all();
        $groupes = Groupe::all();
        $cours = Cour::all();
        $profs = Prof::all();
        $salles = Salle::all();


        return view('admin.seance.edit', compact('specialites' ,'groupes','cours', 'profs','salles','seance','promos'));
    }
    public function update(Request $request , $id){
        $seance = Seance::find($id);
        $seance->promo_id = $request->input('promo_id');
        $seance->specialite_id = $request->input('specialite_id');
        $seance->groupe_id = $request->input('groupe_id');
        $seance->cour_id = $request->input('cour_id');
        $seance->type = $request->input('type');
        $seance->prof_id = $request->input('prof_id');
        $seance->salle_id = $request->input('salle_id');
        $seance->start_time = $request->input('start_time');
        $seance->end_time = $request->input('end_time');

        $seance->save();
        return redirect('seance');
    }

    public function destroy(Request $request, $id)
    {
        //return $request->all();
        $seance = Seance::find($id);

        $seance->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('seance');
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $seances = Salle::query()
            ->where('day', 'LIKE', "%{$search}%")
            ->get();

        //Return the search view with the resluts compacted
        return view('admin.seance.seance_search', compact('seances'));
    }


}
