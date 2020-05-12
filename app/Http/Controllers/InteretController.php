<?php

namespace App\Http\Controllers;

use App\Interet;
use Illuminate\Http\Request;

class InteretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $request->validate([
            'nom' => 'required|string|unique:interets',
        ]);

        $interet = new Interet();
        $interet->nom = $request->input('nom');
        $interet->save();

        return redirect()->route('interet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function show(Interet $interet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interet = Interet::find($id);
        return view('backoffice/interet/edit', compact('interet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|unique:interets,nom,'.$id,
        ]);

        $interet = Interet::find($id);
        $interet->nom = $request->input('nom');
        $interet->save();

        return redirect()->route('interet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interet  $interet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interet = Interet::find($id);
        $interet->delete();
        return redirect()->route('interet.index');
    }
}
