<?php

namespace App\Http\Controllers\Admin;

use App\Cour;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourController extends Controller
{
    public function index()
    {
            $listcour = DB::table('cours')->paginate(3);
           // $listcour = Cour::all();
            //$listcour = cour::all();
       //     $listcour = Cour::with('profs')->get();
    return view('admin\cour.index', ['cours' => $listcour]);

    }
    public function create()
    {
        return view('admin\cour.create');
    }
    public function store(Request $request)
    {
        $cour = new Cour();
        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        $cour->nom = $request->input('nom');
        $cour->save();
        // session()->flash('success', 'année  a étè bien crée');
        return redirect('cour')->with('status', 'annee a etais crée');
    }
    public function edit($id)
    {
        $cour = Cour::find($id);
        return view('admin.cour.edit')->with('cour', $cour);
    }
    public function update(Request $request, $id)
    {
        $cour = Cour::find($id);
        $cour->nom = $request->input('nom');
        $cour->save();
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
