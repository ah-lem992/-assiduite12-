<?php

namespace App\Http\Controllers\Admin;
use App\Cour;
use App\Http\Controllers\Controller;
use App\Prof;
use Illuminate\Http\Request;
use App\Http\Requests\profRequest;
use App\Salle;
use Illuminate\Support\Facades\DB;

class ProfController extends Controller
{
    public function index()
    { //$listpromo = Promo::all();
       $listprof = Prof::paginate(3);
     //$listprof = Prof::with('cours')->get();
    return view('admin.prof.index', ['profs' => $listprof]);
    }
    public function create()
    {

        $cours = Cour::all();
        return view('admin\prof.create', compact('cours'));
       // return view('admin\prof.create');
    }
    public function store(profRequest $request)
    {
        $prof = $request->all();
        Prof::create($prof);
        session()->flash('success','ajout réussi');
        return redirect('prof');

/*

        $prof = new Prof();
        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        $prof->nom = $request->input('nom');
        $prof->grade = $request->input('grade');
        $prof->save();
        // session()->flash('success', 'année  a étè bien crée');
        return redirect('prof')->with("status", "prof ajouté avec succés ");*/
    }
    public function edit($prof_id)
    {
       /* $profs = Prof::all();
        $cour = Cour::find($prof_id);
        return view('admin.prof.edit', compact('cour', 'profs'));*/
        $cours = Cour::all();
        $prof = Prof::find($prof_id);

        return view('admin.prof.edit', compact('cours', 'prof'));
    }
    public function update(profRequest $request, $prof_id)
    {

        $prof = Prof::find($prof_id);
        $prof->nom = $request->input('nom');
        $prof->grade = $request->input('grade');
        $prof->save();

        if ($request->has('courses_ids')) {

        foreach ($request['courses_ids'] as $cour_id){

            $prof->cours()-> syncWithoutDetaching($request->courses_ids);
        }
        }

        return redirect('prof');
    }
    public function destroy(Request $request, $prof_id)
    {
        //return $request->all();
        $prof = Prof::find($prof_id);
        $prof->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('prof')->with('status', 'annee a etais crée ');
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $profs = Prof::query()
            ->where('nom', 'LIKE', "%{$search}%")
            ->get();

        //Return the search view with the resluts compacted
        return view('admin.prof.prof_search', compact('profs'));
    }


}
