<?php

namespace App\Http\Controllers;

use App\Evenement;
use App\Formulaire;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = Evenement::all();
        return view('backoffice.evenement.index', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formulaires = Formulaire::all();
        return view('backoffice.evenement.add', compact('formulaires'));
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
            'description' => 'required|text',
            'titre' => 'required|string',
            'etat' => 'required|string',
            'formulaire' => 'required|integer'
        ]);

        $evenement = new Evenement();
        $evenement->titre = $request->titre;
        $evenement->etat = $request->etat;
        $evenement->description = $request->description;
        $evenement->formulaire_id = $request->formulaire_id;
        $evenement->save();
        return redirect()->route('evenement.index')->with('msg', 'Evènement créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function show(Evenement $evenement)
    {
        return view('backoffice.evenement.show', compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function edit(Evenement $evenement)
    {
        $formulaires = Formulaire::all();
        return view('backoffice.evenement.edit', compact('formulaires', 'evenement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evenement $evenement)
    {
        $request->validate([
            'description' => 'required|text',
            'titre' => 'required|string',
            'etat' => 'required|string',
            'formulaire' => 'required|integer'
        ]);
        $evenement->titre = $request->titre;
        $evenement->etat = $request->etat;
        $evenement->description = $request->description;
        $evenement->formulaire_id = $request->formulaire_id;
        $evenement->save();
        return redirect()->route('evenement.index')->with('msg', 'Evènement modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evenement  $evenement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->back()->with('msg', 'Evènement supprimé avec succès');
    }
}
