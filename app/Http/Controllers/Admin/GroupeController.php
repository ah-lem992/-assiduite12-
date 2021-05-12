<?php

namespace App\Http\Controllers\Admin;

use App\Groupe;
use App\Promo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupeController extends Controller
{
    public function index()
    {
        $listgroupe = Groupe::with('promo')->get();
        return view('admin.groupe.index', ['groupes' => $listgroupe]);
    }
    public function create()
    {
        $promos = Promo::all();
        return view('admin\groupe.create', compact('promos'));
    }
    public function store(Request $request)
    {
        $groupe = $request->all();
        Groupe::create($groupe);
        return redirect('groupe')->with("status", "l'annee a etais crée ");

        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        /* $groupe->groupe = $request->input('groupe');
        $groupe->promo_id = $request->input('select');
        $groupe->save();
        // session()->flash('success', 'année  a étè bien crée');
        return redirect('groupe')->with("status", "l'annee a etais crée ");*/
    }


    public function edit($groupe_id)
    {
        $promos = Promo::all();
        $groupe = Groupe::find($groupe_id);
        return view('admin.groupe.edit', compact('groupe', 'promos'));
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
