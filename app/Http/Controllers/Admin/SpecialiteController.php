<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Promo;
use App\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listspecialite = Specialite::all();
        return view('admin.specialite.index', ['specialites' => $listspecialite]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $promos = Promo::all();
        return view('admin\specialite.create', compact('promos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $specialite =new Specialite([
            "specialite" => $request->get("specialite"),
            "promo_id" => $request->get("promo_id"),
            ]);
        $specialite->save();
        return redirect('specialite');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($specialite_id)
    {
        $promos = Promo::all();
        $specialite = Specialite::find($specialite_id);
        return view('admin.specialite.edit', compact('specialite', 'promos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $specialite_id)
    {
        $specialite = Specialite::find($specialite_id);
        $specialite->specialite = $request->input('specialite');
        $specialite->promo_id = $request->input('promo_id');
        $specialite->save();
        return redirect('specialite');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($specialite_id)
    {
        $specialite = Specialite::find($specialite_id);
        $specialite->delete();
        // session()->flash('danger', 'année a étè  supprimé');
        return redirect('specialite');
    }
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $specialites = Specialite::query()
            ->where('specialite', 'LIKE', "%{$search}%")
            ->get();

        //Return the search view with the resluts compacted
        return view('admin.specialite.specialite_search', compact('specialites'));
    }
}
