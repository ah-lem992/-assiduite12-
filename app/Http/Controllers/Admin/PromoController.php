<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Promo;
use Illuminate\Http\Request;


class PromoController extends Controller
{
    public function index()
    {
        $listpromo = Promo::all();
        return view('admin\promo.index', ['promos' => $listpromo]);
    }
    public function create()
    {
        return view('admin\promo.create');
    }
    public function store(Request $request)
    {
        $promo = new Promo();
        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        $promo->annee = $request->input('annee');
        $promo->save();
        // session()->flash('success', 'année  a étè bien crée');
        return redirect('promo')->with("status", "l'annee a etais crée ");;
    }
    public function edit($id)
    {
        $promo = Promo::find($id);
        return view('admin\promo.edit', ['promo' => $promo]);
    }
    public function update(Request $request, $id)
    {
        $promo = Promo::find($id);
        $promo->annee = $request->input('annee');
        $promo->save();
        return redirect('promo')->with("status", "l'annee a etais crée ");
    }
}
