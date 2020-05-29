<?php

namespace App\Http\Controllers;

use App\Phrase;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phrase $phrase)
    {
        $this->authorize('evenement');
        $request->validate([
            'texte' => 'required|string',
        ]);
        $phrase->texte = $request->texte;
        $phrase->save();
        return redirect()->back()->with('msg', 'Phrase modifié avec succès');
    }
}
