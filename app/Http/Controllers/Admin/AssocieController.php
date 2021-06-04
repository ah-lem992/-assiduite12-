<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cour;
use App\Prof;
use Illuminate\Support\Facades\DB;
class AssocieController extends Controller
{
    public function associe(){
        $profs = Prof::all();
        $cours =Cour::all();

        return view('admin.prof.associe',compact('cours', 'profs'));
    }

    public function store(Request $request)
    {
       $data = DB::table('cour_prof');
        $data = $request->all();

   //     return redirect('prof-save');

        // var -> champs dans bdd = var dans chmps $req ->input(nom input)
        /* $groupe->groupe = $request->input('groupe');
        $groupe->promo_id = $request->input('select');
        $groupe->save();
        // session()->flash('success', 'année  a étè bien crée');
        return redirect('groupe')->with("status", "l'annee a etais crée ");*/
    }
}
