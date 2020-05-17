<?php

namespace App\Http\Controllers;

use App\Description;
use App\Etape;
use App\Evenement;
use App\Titre;
use Illuminate\Http\Request;

class EtapeController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $evenement = Evenement::find($id);
        $titres = Titre::all();
        $descriptions = Description::all();
        return view('backoffice.etape.add', compact('evenement','titres','descriptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $evenement = Evenement::find($id);
        $min = $evenement->date . ' -1 day';
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date|after:' . $min
        ]);

        $etape = new Etape();
        $etape->titre = $request->titre;
        $etape->description = $request->description;
        $etape->date = $request->date;
        $etape->evenement_id = $id;
        $etape->save();
        return redirect()->route('evenement.show', $id)->with('msg', 'Etape créée avec succès');;
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Etape  $etape
     * @return \Illuminate\Http\Response
     */
    public function edit(Etape $etape)
    {
        $titres = Titre::all();
        $descriptions = Description::all();
        return view('backoffice.etape.edit', compact('etape','titres','descriptions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Etape  $etape
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etape $etape)
    {
        $evenement = Evenement::find($etape->evenement_id);
        $min = $evenement->date . ' -1 day';
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date|after:' . $min
        ]);

        $etape->titre = $request->titre;
        $etape->description = $request->description;
        $etape->date = $request->date;
        $etape->save();
        return redirect()->route('evenement.show', $etape->evenement->id)->with('msg', 'Etape modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Etape  $etape
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etape $etape)
    {
        $etape->delete();
        return redirect()->back()->with('msg', 'Etape supprimée avec succès');
    }
}
