<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Promo;
use App\groupe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\promoRequest;
use App\Specialite;
use PHPUnit\TextUI\XmlConfiguration\Group;

class PromoController extends Controller
{
    public function index()
    {
        $listpromo = Promo::paginate(3);

        //  $listpromo = DB::table('promos')->paginate(3);
        //$listpromo = Promo::all()
        return view('admin\promo.index', ['promos' => $listpromo]);
    }
    public function create()
    {
        return view('admin\promo.create');
    }
    public function store(promoRequest $request)
    {
        $promo = new Promo();
        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        $promo->annee = $request->input('annee');
        $promo->save();
        session()->flash('success', 'ajout réussi');
        // session()->flash('success', 'année  a étè bien crée');
        return redirect('promo');
    }
    public function edit($id)
    {
        $promo = Promo::find($id);
        return view('admin.promo.edit')->with('promo', $promo);
    }
    public function update(promoRequest $request, $id)
    {
        $promo = Promo::find($id);
        $promo->annee = $request->input('annee');
        $promo->save();
        return redirect('promo');
    }
    public function show($id)
    {
        $promos = Promo::find($id);
        $groupes =$promos->groupe;

        return view('admin.promo.show', compact(['promos', 'groupes']));
    }
    public function destroy(Request $request, $id)
    {
        //return $request->all();
        $promo = Promo::find($id);
        $promo->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('promo');
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $promos = Promo::query()
            ->where('annee', 'LIKE', "%{$search}%")
            ->get();

        //Return the search view with the resluts compacted
        return view('admin.promo.search', compact('promos'));
    }
}
