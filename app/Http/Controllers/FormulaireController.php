<?php

namespace App\Http\Controllers;

use App\Formulaire;
use App\Interet;
use Illuminate\Http\Request;

class FormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formulaires = Formulaire::all();
        return view('backoffice.formulaire.index', compact('formulaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $interets = Interet::all();
        return view('backoffice.formulaire.add', compact('interets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'interet.*' => 'required|integer'
        ]);

        $formulaire = new Formulaire();
        $formulaire->titre = $request->titre;
        $formulaire->save();
        $formulaire->interets()->attach($request->interet);
        return redirect()->route('formulaire.index')->with('msg', 'Formulaire créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Formulaire  $formulaire
     * @return \Illuminate\Http\Response
     */
    public function show(Formulaire $formulaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formulaire  $formulaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Formulaire $formulaire)
    {
        $interets = Interet::all();
        return view('backoffice.formulaire.edit', compact('interets', 'formulaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formulaire  $formulaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formulaire $formulaire)
    {
        $request->validate([
            'titre' => 'required|string',
            'interet.*' => 'required|integer'
        ]);

        $formulaire->titre = $request->titre;
        $formulaire->save();
        $formulaire->interets()->detach();
        $formulaire->interets()->attach($request->interet);
        return redirect()->route('formulaire.index')->with('msg', 'Formulaire créé avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formulaire  $formulaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formulaire $formulaire)
    {
        $formulaire->delete();
        return redirect()->back()->with('msg', 'Formulaire créé avec succès');
    }
}
