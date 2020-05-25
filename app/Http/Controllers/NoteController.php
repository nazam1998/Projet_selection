<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('suivi-ecriture');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'titre' => 'required|string',
            'note' => 'required|string',
            'date' => 'required|date',

        ]);

        $note = new Note();
        $note->titre = $request->titre;
        $note->note = $request->note;
        $note->date = $request->date;
        $note->user_id = $user->id;
        $note->save();
        return redirect()->back()->with('msg', 'Note ajoutée avec succés');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $note = Note::find($id);
        return view('backoffice.note.edit', compact('note','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        $request->validate([
            'titre' => 'required|string',
            'note' => 'required|string',
            'date' => 'required|date',

        ]);

        $note = Note::find($id);
        $note->titre = $request->titre;
        $note->note = $request->note;
        $note->date = $request->date;
        $note->save();
        if ($note->user->role_id == 6) {

            return redirect()->route('student.show', $note->user_id)->with('msg', 'Note modifiée avec succés');
        } else {
            return redirect()->route('staff.show', $note->user_id)->with('msg', 'Note modifiée avec succés');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect()->back()->with('msg', 'Note supprimée avec succés');
    }
}
