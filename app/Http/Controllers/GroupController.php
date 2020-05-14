<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        return view('backoffice.group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $responsables = User::where('role_id', 2)->get();
        $coachs = User::where('role_id', 5)->get();
        return view('backoffice.group.add', compact('coachs', 'responsables'));
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
            'nom' => 'required|string|unique:groups',
            'responsable_id' => 'required|integer',
            'coach_id' => 'nullable|integer'
        ]);

        $group = new Group();
        $group->nom = $request->nom;
        $group->responsable_id = $request->responsable_id;
        if ($request->has('coach_id')) {
            $group->coach_id = $request->coach_id;
        }
        $group->save();
        return redirect()->route('group.index')->with('msg', 'Groupe créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('backoffice.group.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $responsables = User::where('role_id', 2)->get();
        $coachs = User::where('role_id', 5)->get();
        return view('backoffice.group.edit', compact('coachs', 'responsables', 'group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $request->validate([
            'nom' => 'required|string|unique:groups,nom,' . $group->id,
            'responsable_id' => 'required|integer',
            'coach_id' => 'nullable|integer'
        ]);

        $group->nom = $request->nom;
        $group->responsable_id = $request->responsable_id;
        if ($request->has('coach_id')) {
            $group->coach_id = $request->coach_id;
        }
        $group->save();
        return redirect()->route('group.index')->with('msg', 'Groupe modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->back()->with('msg', 'Groupe supprimé avec succès');
    }
}
