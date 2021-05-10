<?php

namespace App\Http\Controllers\Admin;

use App\Groupe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupeController extends Controller
{
    public function index()
    {
        $listgroupe = Groupe::all();
        return view('admin.groupe.index', ['groupes' => $listgroupe]);
    }
    public function create()
    {
        return view('admin\groupe.create');
    }
    public function store(Request $request)
    {
        $groupe = new Groupe();
        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        $groupe->groupe = $request->input('groupe');
        $groupe->save();
        // session()->flash('success', 'année  a étè bien crée');
        return redirect('groupe')->with("status", "l'annee a etais crée ");
    }


    public function edit($groupe_id)
    {
        $groupe = Groupe::find($groupe_id);
        return view('admin.groupe.edit')->with('groupe', $groupe);
    }


    public function update(Request $request, $groupe_id)
    {
        $groupe = Groupe::find($groupe_id);
        $groupe->groupe = $request->input('groupe');
        $groupe->save();
        return redirect('groupe')->with("status", "l'annee a etais crée ");
    }
    public function destroy(Request $request, $groupe_id)
    {
        //return $request->all();
        $groupe = Groupe::find($groupe_id);
        $groupe->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('groupe')->with("status", "l'annee a etais crée ");
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $groupe_search = $request->input('search');

        // Search in the title and body columns from the posts table
        $groupes = Groupe::query()
            ->where('groupe', 'LIKE', "%{$groupe_search}%")
            ->get();

        //Return the search view with the resluts compacted
        return view('admin.groupe.groupe_search', compact('groupes'));
    }
}
