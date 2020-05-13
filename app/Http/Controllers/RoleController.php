<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('backoffice.role.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $candidat_lectures = Permission::where('nom', 'LIKE', 'candidat-lecture%')->get();
        $user_lectures = Permission::where('nom', 'LIKE', 'user-lecture%')->get();
        $user_ecritures = Permission::where('nom', 'LIKE', 'user-ecriture%')->get();
        return view('backoffice.role.add', compact('candidat_lectures', 'user_lectures', 'user_ecritures'));
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
            'nom' => 'required|string|unique:roles',

        ]);

        $role = new Role();
        $role->nom = $request->nom;
        $role->save();
        if ($request->has('full')) {
            foreach (Permission::all()->pluck('id') as $item) {
                $role->permissions()->attach($item);
            }
        } else if ($request->has('lecture')) {
            foreach (Permission::where('nom', 'LIKE', '%lecture%')->pluck('id') as $item) {
                $role->permissions()->attach($item);
            }
        } else {
            if ($request->has('annonce')) {
                $role->permissions()->attach(Permission::where('nom', 'annonce')->first()->id);
            }
            if ($request->has('contact')) {
                $role->permissions()->attach(Permission::where('nom', 'contact')->first()->id);
            }
            if ($request->has('groupe')) {
                $role->permissions()->attach(Permission::where('nom', 'groupe')->first()->id);
            }
            if ($request->has('candidat-full')) {
                $role->permissions()->attach(Permission::where('nom', 'candidat-full')->first()->id);
            } else if ($request->has('candidat-lecture')) {
                foreach ($request->candidat_lecture as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'candidat-lecture-' . $item)->first()->id);
                }
            }
            if ($request->has('user-lecture')) {
                foreach ($request->has('user-lecture') as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-lecture-' . $item)->first()->id);
                }
            }
            if ($request->has('user-ecriture')) {
                foreach ($request->has('user-ecriture') as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-ecriture-' . $item)->first()->id);
                }
            }
        }
        return redirect()->route('role.index')->with('Role créé avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $candidat_lectures = Permission::where('nom', 'LIKE', 'candidat-lecture%')->get();
        $user_lectures = Permission::where('nom', 'LIKE', 'user-lecture%')->get();
        $user_ecritures = Permission::where('nom', 'LIKE', 'user-ecriture%')->get();
        return view('backoffice.role.edit', compact('role','candidat_lectures', 'user_lectures', 'user_ecritures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nom' => 'required|string|unique:roles,nom,' . $role->id,
        ]);

        $role = new Role();
        $role->nom = $request->nom;
        $role->save();
        $role->permissions()->detach();
        if ($request->has('full')) {
            foreach (Permission::all()->pluck('id') as $item) {
                $role->permissions()->attach($item);
            }
        } else if ($request->has('lecture')) {
            foreach (Permission::where('nom', 'LIKE', '%lecture%')->pluck('id') as $item) {
                $role->permissions()->attach($item);
            }
        } else {
            if ($request->has('annonce')) {
                $role->permissions()->attach(Permission::where('nom', 'annonce')->first()->id);
            }
            if ($request->has('contact')) {
                $role->permissions()->attach(Permission::where('nom', 'contact')->first()->id);
            }
            if ($request->has('groupe')) {
                $role->permissions()->attach(Permission::where('nom', 'groupe')->first()->id);
            }
            if ($request->has('candidat-full')) {
                $role->permissions()->attach(Permission::where('nom', 'candidat-full')->first()->id);
            } else {
                foreach ($request->has('candidat-lecture') as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'candidat-lecture-' . $item)->first()->id);
                }
            }
            if ($request->has('user-lecture')) {
                foreach ($request->has('user-lecture') as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-lecture-' . $item)->first()->id);
                }
            }
            if ($request->has('user-ecriture')) {
                foreach ($request->has('user-ecriture') as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-ecriture-' . $item)->first()->id);
                }
            }
        }
        return redirect()->route('role.index')->with('Role modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('Role supprimé avec succés');
    }
}
