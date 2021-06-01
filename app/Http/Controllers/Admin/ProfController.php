<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Prof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfController extends Controller
{
    public function index()
    { //$listpromo = Promo::all();
       $listprof = DB::table('profs')->paginate(3);
     //$listprof = Prof::with('cours')->get();
    return view('admin.prof.index', ['profs' => $listprof]);
    }
    public function create()
    {
        return view('admin\prof.create');
    }
    public function store(Request $request)
    {
        $prof = new Prof();
        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        $prof->nom = $request->input('nom');
        $prof->grade = $request->input('grade');
        $prof->save();
        // session()->flash('success', 'année  a étè bien crée');
        return redirect('prof')->with("status", "prof ajouté avec succés ");
    }
    public function edit($prof_id)
    {
        $prof = Prof::find($prof_id);
        return view('admin.prof.edit')->with('prof', $prof);
    }
    public function update(Request $request, $prof_id)
    {
        $prof = Prof::find($prof_id);
        $prof->nom = $request->input('nom');
        $prof->grade = $request->input('grade');
        $prof->save();
        return redirect('prof')->with("status", "l'annee a etais crée ");
    }
    public function destroy(Request $request, $prof_id)
    {
        //return $request->all();
        $prof = Prof::find($prof_id);
        $prof->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('groupe')->with('status', 'annee a etais crée ');
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
