<?php

namespace App\Http\Controllers;

use App\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matieres = Matiere::all();
        return view('backoffice.matiere.index', compact('matiere'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.matiere.add');
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
            'nom' => 'required|string|unique:matieres',
            'image' => 'required|image'
        ]);
        $matiere = new Matiere();
        $matiere->nom = $request->nom;
        $image = Storage::disk('public')->put('', $request->image);
        $matiere->image = $image;
        $matiere->save();
        return redirect()->route('matiere.index')->with('msg', 'Matière créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
    {
        return view('backoffice.matiere.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matiere $matiere)
    {
        $request->validate([
            'nom' => 'required|string|unique:matieres,nom,'.$matiere->id,
            'image' => 'sometimes|image'
        ]);
        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($matiere->image)) {
                Storage::disk('public')->delete($matiere->image);
            }
            $image = Storage::disk('public')->put('', $request->image);
            $matiere->image = $image;
        }

        $matiere->nom = $request->nom;

        $matiere->save();
        return redirect()->route('matiere.index')->with('msg', 'Matière modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {
        if (Storage::disk('public')->exists($matiere->image)) {
            Storage::disk('public')->delete($matiere->image);
        }
        $matiere->delete();
        return redirect()->back()->with('msg', 'Matière supprimé avec succès');
    }
}
