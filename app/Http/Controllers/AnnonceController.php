<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('annonce');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonce= Annonce::all();
        return view('backoffice.annonce.index',compact('annonce'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function edit(Annonce $annonce)
    {
        return view('backoffice.annonce.edit',compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Annonce  $annonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Annonce $annonce)
    {
        $request->validate([
            'texte'=>'required|string',
            'date'=>'required|date|after:yesterday',
        ]);
        $annonce->texte=$request->texte;
        $annonce->date=$request->date;
        $annonce->afficher=$request->has('afficher');
        $annonce->save();
        return redirect()->route('annonce.index')->with('msg','Annonce modifiée avec succés');
    }

    
}
