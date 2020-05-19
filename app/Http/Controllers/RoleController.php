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
        $roles = Role::all();
        return view('backoffice.role.add', compact('candidat_lectures', 'user_lectures', 'user_ecritures', 'roles'));
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
        $roles = Role::all();

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
            foreach ($roles as $item) {
                $item->roles()->attach($role->id, ['ecriture' => false]);
            }
            
        } else {
            if ($request->has('annonce-ecriture')) {
                $role->permissions()->attach(Permission::where('nom', 'annonce-ecriture')->first()->id);
                $role->permissions()->attach(Permission::where('nom', 'annonce-lecture')->first()->id);
            } else if ($request->has('annonce-ecriture')) {
                $role->permissions()->attach(Permission::where('nom', 'annonce-lecture')->first()->id);
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
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-lecture-' . $item)->first()->id);
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-ecriture-' . $item)->first()->id);
                }
            }

            if ($request->has('suivi-ecriture')) {
                foreach ($request->has('suivi-ecriture') as $item) {
                    $item->roles()->attach($item->id, ['ecriture' => true]);
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
        $roles = Role::all();
        return view('backoffice.role.edit', compact('role', 'candidat_lectures', 'user_lectures', 'user_ecritures', 'roles'));
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

                $role->permissions()->attach(Permission::where('nom', $request->annonce)->first()->id);
                if ($request->annonce == 'annonce-écriture') {
                    $role->permissions()->attach(Permission::where('nom', 'annonce-lecture')->first()->id);
                }
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
