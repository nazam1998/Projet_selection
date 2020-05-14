<?php

namespace App\Http\Controllers;

use App\Etape;
use App\Evenement;
use Illuminate\Http\Request;

class EtapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $evenement=Evenement::find($id);
        return view('backoffice.etape.add',compact('evenement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'titre'=>'required|string',
            'description'=>'required|string',
            'date'=>'required|date|after:yesterday'
        ]);
        
        $etape=new Etape();
        $etape->titre=$request->titre;
        $etape->description=$request->description;
        $etape->date=$request->date;
        $etape->evenement_id=$id;
        $etape->save();
        return redirect()->route('evenement.show',$id)->with('msg','Etape créée avec succès');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Etape  $etape
     * @return \Illuminate\Http\Response
     */
    public function show(Etape $etape)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Etape  $etape
     * @return \Illuminate\Http\Response
     */
    public function edit(Etape $etape)
    {
        return view('backoffice.etape.edit',compact('etape'));
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
        $request->validate([
            'titre'=>'required|string',
            'description'=>'required|string',
            'date'=>'required|date|after:yesterday'
        ]);
        
        $etape->titre=$request->titre;
        $etape->description=$request->description;
        $etape->date=$request->date;
        $etape->save();
        return redirect()->route('evenement.show',$etape->evenement->id)->with('msg','Etape modifiée avec succès');
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
        return redirect()->back()->with('msg','Etape supprimée avec succès');
    }
}
