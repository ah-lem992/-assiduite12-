<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\salleRequest;
use App\Salle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalleController extends Controller
{
    public function index(){
         $listsalle = DB::table('salles')->paginate(3);
        //$listsalle = Salle::all();
        return view('admin\salle.index', ['salles' => $listsalle]);
    }
    public function create()
    {
        return view('admin\salle.create');
    }
    public function store(salleRequest $request)
    {
        $salle = new Salle();
        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        $salle->num = $request->input('num');
        $salle->save();
        // session()->flash('success', 'année  a étè bien crée');
        session()->flash('success','ajout réussi');
        return redirect('salle');
    }
    public function edit($salle_id)
    {
        $salle = Salle::find($salle_id);
        return view('admin.salle.edit')->with('salle', $salle);
    }
    public function update(salleRequest $request, $salle_id)
    {
        $salle = Salle::find($salle_id);
        $salle->num = $request->input('num');
        $salle->save();
        return redirect('salle')->with("status", "l'num a etais crée ");
    }
    public function destroy(Request $request, $salle_id)
    {
        //return $request->all();
        $salle = Salle::find($salle_id);

        $salle->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('salle')->with("status", "l'annee a etais crée ");
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $salles = Salle::query()
            ->where('num', 'LIKE', "%{$search}%")
            ->get();

        //Return the search view with the resluts compacted
        return view('admin.salle.salle_search', compact('salles'));
    }
}
