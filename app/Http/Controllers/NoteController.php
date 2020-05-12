<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
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
    public function create($user)
    {
        return view('backoffice.note.add',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user)
    {
        $request->validate([
            'titre' => 'required|string',
            'note' => 'required|string',

        ]);

        $note = new Note();
        $note->titre = $request->titre;
        $note->note = $request->note;
        $note->user_id = $user;
        $note->save();
        return redirect()->back()->with('msg', 'Note ajoutée avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $notes = Note::where('user_id', $user)->get();
        return view('backoffice.note.show', compact('notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note,$user)
    {
        return view('backoffice.note.edit',compact('note','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note, $user)
    {
        $request->validate([
            'titre' => 'required|string',
            'note' => 'required|string',

        ]);

        $note->titre = $request->titre;
        $note->note = $request->note;
        $note->user_id = $user;
        $note->save();
        return redirect()->back()->with('msg', 'Note modifiée avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->back()->with('msg', 'Note supprimée avec succés');
    }
}
