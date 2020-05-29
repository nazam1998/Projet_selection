<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('groupe');
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
        $this->authorize('groupe');
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
        $this->authorize('groupe');
        $request->validate([
            'nom' => 'required|string|unique:groups',
            'responsable_id' => 'required|integer',
            'coach_id' => 'nullable|integer'
        ]);

        $group = new Group();
        $group->nom = $request->nom;
        $group->save();
        $group->users()->attach($request->responsable_id, ['role_id' => User::find($request->responsable_id)->role_id]);
        if ($request->has('coach_id')) {
            $group->users()->attach($request->coach_id, ['role_id' => User::find($request->coach_id)->role_id]);
        }
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
        $this->authorize('groupe');
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
        $this->authorize('groupe');
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
        $this->authorize('groupe');
        $request->validate([
            'nom' => 'required|string|unique:groups,nom,' . $group->id,
            'responsable_id' => 'required|integer',
            'coach_id' => 'nullable|integer'
        ]);

        $group->nom = $request->nom;

        $group->users()->detach($group->users->where('role_id', 2)->first()->id);
        User::find($request->responsable_id)->group()->detach();
        $group->users()->attach($request->responsable_id, ['role_id' => User::find($request->responsable_id)->role_id]);

        if ($group->users->where('role_id', 5)->first()) {
            $group->users()->detach($group->users->where('role_id', 5)->first()->id);
        }
        if ($request->coach_id != '') {
            User::find($request->coach_id)->group()->detach();
            $group->users()->attach($request->coach_id, ['role_id' => User::find($request->coach_id)->role_id]);
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
        $this->authorize('groupe');
        $group->delete();
        return redirect()->back()->with('msg', 'Groupe supprimé avec succès');
    }
}
