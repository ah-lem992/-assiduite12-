<?php

namespace App\Http\Controllers\Prof;

use App\Etudiant;
use App\Http\Controllers\Controller;
use App\Presence;
use Illuminate\Http\Request;

class ProfController extends Controller
{
    public function index()
    {
       /* $etudiants = Etudiant::all();
        return view('profeseur.etudiants.index', compact('etudiants'));*/
        $presences = Presence::all();

        return view('profeseur.presences.index', compact('presences'));
    }
}
