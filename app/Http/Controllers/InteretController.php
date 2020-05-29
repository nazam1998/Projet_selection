<?php

namespace App\Http\Controllers;

use App\Interet;
use Illuminate\Http\Request;

class InteretController extends Controller
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
        $interet = Interet::all();
        return view('backoffice/interet/index', compact('interet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('evenement');
        return view('backoffice/interet/add');
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
            'nom' => 'required|string|unique:interets',
        ]);

        $interet = new Interet();
        $interet->nom = $request->input('nom');
        $interet->save();

        return redirect()->route('interet.index')->with('msg', 'Intérêt ajouté avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function edit(Interet $interet)
    {
        $this->authorize('evenement');
        return view('backoffice/interet/edit', compact('interet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interet $interet)
    {
        $this->authorize('evenement');
        $request->validate([
            'nom' => 'required|string|unique:interets,nom,' . $interet->id,
        ]);


        $interet->nom = $request->input('nom');
        $interet->save();

        return redirect()->route('interet.index')->with('msg', 'Intérêt modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('evenement');
        $interet = Interet::find($id);
        $interet->delete();
        return redirect()->route('interet.index')->with('msg', 'Intérêt supprimé avec succès');
    }
}
