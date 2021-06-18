<?php

namespace App\Http\Controllers\Admin;

use App\Cour;
use App\Http\Controllers\Controller;
use App\Http\Requests\courRequest;
use App\Prof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourController extends Controller
{
    public function index()
    {
        $listcour = Cour::paginate(3);
           // $listcour = Cour::all();
            //$listcour = cour::all();
       //     $listcour = Cour::with('profs')->get();
    return view('admin\cour.index', ['cours' => $listcour]);

    }
    public function create()
    {
       /* $profs = Prof::all();
        return view('admin\prof.create', compact('profs'));*/
         return view('admin\cour.create');
    }
    public function store(courRequest $request)
    {
        $cour = new Cour(); 
        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        $cour->nom = $request->input('nom');
        $cour->save();
        // session()->flash('success', 'année  a étè bien crée');
        session()->flash('success','ajout réussi');
        return redirect('cour');
    }
    public function edit($cour_id)
    {
        $cour = Cour::find($cour_id);
        $profs = Prof::all();
        return view('admin.cour.edit', compact('cour', 'profs'));
    }
    public function update(courRequest $request, $cour_id)
    {
        $cour = Cour::find($cour_id);
        $cour->nom = $request->input('nom');
        $cour->save();

        if ($request->has('profses_ids')) {

            foreach ($request['profses_ids'] as $prof_id){

                $cour->profs()-> syncWithoutDetaching($request->profses_ids);
            }
            }
            return redirect('cour')->with('status', 'annee a etais crée ');
    }
    public function destroy(Request $request, $cour_id)
    {
        //return $request->all();
        $cour = Cour::find($cour_id);
        $cour->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('cour')->with('status', 'annee a etais crée ');
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $cours = Cour::query()
            ->where('nom', 'LIKE', "%{$search}%")
            ->get();

        //Return the search view with the resluts compacted
        return view('admin.cour.cour_search', compact('cours'));
    }

}
