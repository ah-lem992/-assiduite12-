<?php

namespace App\Http\Controllers\Admin;

use App\Etudiant;
use App\Groupe;
use App\Http\Controllers\Controller;
use App\Http\Requests\etudiantRequest;
use App\Promo;
use App\Specialite;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {

        $etudiants = Etudiant::all();
        //dd($etudiants);
        return view('admin.etudiant.index', compact('etudiants'));
    }
    public function create()
    {
        $promos=Promo::all();
        $groupes = Groupe::all();
        $specialites = Specialite::all();
        return view('admin\etudiant.create', compact('groupes', 'specialites','promos'));
    }
    public function store(etudiantRequest $request)
    {

        $etudiant = new Etudiant([
            "promo_id" => $request->get('promo_id'),
            "groupe_id" => $request->get('groupe_id'),
            "specialite_id" => $request->get('specialite_id'),
            "nom" => $request->get("nom"),
            "prenom" => $request->get("prenom"),
            "sexe" => $request->get("sexe"),
            "naissance" => $request->get("naissance"),
            "phone" => $request->get("phone"),
            "email" => $request->get("email"),
            "adresse" => $request->get("adresse"),
            "photo" => $request->get("photo")
        ]);
        $etudiant->save();
        session()->flash('success', 'ajout réussi');
        return redirect('etudiant');
    }
    public function edit($etud_id)
    {
        $promos=Promo::all();
        $groupes = Groupe::all();
        $specialites = Specialite::all();
        $etudiant = Etudiant::find($etud_id);

        return view('admin.etudiant.edit', compact('groupes', 'etudiant', 'specialites','promos'));
    }
    public function update(etudiantRequest $request, $etud_id)
    {
        $etudiant = Etudiant::find($etud_id);
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->sexe = $request->input('sexe');
        $etudiant->naissance = $request->input('naissance');
        $etudiant->phone = $request->input('phone');
        $etudiant->email = $request->input('email');
        $etudiant->adresse = $request->input('adresse');
        $etudiant->photo = $request->input('photo');
        $etudiant->groupe_id = $request->input('groupe_id');
        $etudiant->specialite_id = $request->input('specialite_id');
        $etudiant->promo_id = $request->input('promo_id');
        $etudiant->save();
        return redirect('etudiant');
    }
    public function destroy(Request $request, $etud_id)
    {
        //return $request->all();
        $etudiant = Etudiant::find($etud_id);
        $etudiant->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('etudiant');
    }
}
