<?php

namespace App\Http\Controllers\Admin;

use App\Groupe;
use App\Promo;
use App\Http\Controllers\Controller;
use App\Http\Requests\groupeRequest;
use App\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupeController extends Controller
{
    public function index()

    {
       // $listgroupe = DB::table('groupes')->paginate(3);
        $listgroupe = Groupe::paginate(6);
           $promos = Promo::all()->groupBy('promo_id');
        $specialites =Specialite::all();
        return view('admin.groupe.index', ['groupes' => $listgroupe]);
    }
    public function create()
    {
        $promos = Promo::all();
        $specialites = Specialite::all();
        return view('admin\groupe.create', compact('promos','specialites'));
    }
    public function store(groupeRequest $request)
    {
        $groupe = $request->all();
        Groupe::create($groupe);
        return redirect('groupe');
        session()->flash('success','ajout réussi');



        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        /* $groupe->groupe = $request->input('groupe');
        $groupe->promo_id = $request->input('select');
        $groupe->save();
        // session()->flash('success', 'année  a étè bien crée');
        return redirect('groupe');*/
    }


    public function edit($groupe_id)
    {
        $promos = Promo::all();
        $specialites =Specialite::all();
        $groupe = Groupe::find($groupe_id);
        return view('admin.groupe.edit', compact('groupe', 'promos','specialites'));
    }


    public function update(groupeRequest $request, $groupe_id)
    {
        $groupe = Groupe::find($groupe_id);
        $groupe->groupe = $request->input('groupe');
        $groupe->promo_id = $request->input('promo_id');
        $groupe->specialite_id = $request->input('specialite_id');
        $groupe->save();
        return redirect('groupe');
    }
    public function destroy(Request $request, $groupe_id)
    {
        //return $request->all();
        $groupe = Groupe::find($groupe_id);
        $groupe->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('groupe');
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $groupes = Groupe::query()
            ->where('groupe', 'LIKE', "%{$search}%")
            ->get();

        //Return the search view with the resluts compacted
        return view('admin.groupe.groupe_search', compact('groupes'));
    }
}
