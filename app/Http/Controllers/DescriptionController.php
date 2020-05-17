<?php

namespace App\Http\Controllers;

use App\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descriptions = Description::all();
        return view('backoffice.description.index', compact('descriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.description.index');
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
            'description' => 'required|string|unique:descriptions',
        ]);
        $description = new Description();
        $description->description = $request->description;
        $description->save();
        return redirect()->back()->with('msg', 'Description modifié avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Description  $description
     * @return \Illuminate\Http\Response
     */
    public function show(Description $description)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Description  $description
     * @return \Illuminate\Http\Response
     */
    public function edit(Description $description)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Description  $description
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Description $description)
    {
        $request->validate([
            'description' => 'required|string|unique:descriptions,description,' . $description->id,
        ]);
        $description->description = $request->description;
        $description->save();
        return redirect()->back()->with('msg', 'Description modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Description  $description
     * @return \Illuminate\Http\Response
     */
    public function destroy(Description $description)
    {

        $description->save();
        return redirect()->back()->with('msg', 'Description modifié avec succès');
    }
}
