<?php

namespace App\Http\Controllers;

use App\Titre;
use Illuminate\Http\Request;

class TitreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('evenement');
        $titres = Titre::all();
        return view('backoffice.titre.index', compact('titres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('evenement');
        return view('backoffice.titre.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('evenement');
        $request->validate([
            'titre' => 'required|string|unique:titres',
        ]);
        $titre = new Titre();
        $titre->titre = $request->titre;
        $titre->save();
        return redirect()->route('titre.index')->with('msg', 'Titre créé avec succès');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Titre  $titre
     * @return \Illuminate\Http\Response
     */
    public function edit(Titre $titre)
    {
        $this->authorize('evenement');
        return view('backoffice.titre.edit', compact('titre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titre  $titre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Titre $titre)
    {
        $this->authorize('evenement');
        $request->validate([
            'titre' => 'required|string|unique:titres,titre,' . $titre->id,
        ]);
        $titre->titre = $request->titre;
        $titre->save();
        return redirect()->route('titre.index')->with('msg', 'Titre modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Titre  $titre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titre $titre)
    {
        $this->authorize('evenement');
        $titre->delete();
        return redirect()->back()->with('msg', 'Titre supprimé avec succès');
    }
}
