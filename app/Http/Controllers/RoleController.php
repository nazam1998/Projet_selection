<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
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
        $roles = Role::where('id', '!=', 1)->get();
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
            // 'suivi_role.*' => 'nullable|min:2,max:' . count(Role::all()),

        ]);
        $roles = Role::where('id', '!=', 1)->get();
        $role = new Role();
        $role->nom = $request->nom;
        $role->responsable = false;
        $role->save();
        if ($request->has('full')) {
            $role->roles()->attach(Role::where('id', '!=', 1)->pluck('id'), ['ecriture' => true]);
            foreach (Permission::all()->pluck('id') as $item) {
                $role->permissions()->attach($item);
            }
        } else if ($request->has('lecture')) {
            $role->roles()->attach(Role::where('id', '!=', 1)->pluck('id'), ['ecriture' => false]);

            foreach (Permission::where('nom', 'LIKE', '%lecture%')->pluck('id') as $item) {
                $role->permissions()->attach($item);
            }
            foreach ($roles as $item) {
                $item->roles()->attach($role->id, ['ecriture' => false]);
            }
        } else {
            if ($request->has('annonce_ecriture')) {
                $role->permissions()->attach(Permission::where('nom', 'annonce-ecriture')->first()->id);
                $role->permissions()->attach(Permission::where('nom', 'annonce-lecture')->first()->id);
            } else if ($request->has('annonce_ecriture')) {
                $role->permissions()->attach(Permission::where('nom', 'annonce-lecture')->first()->id);
            }
            if ($request->has('contact')) {
                $role->permissions()->attach(Permission::where('nom', 'contact')->first()->id);
            }
            if ($request->has('groupe')) {
                $role->permissions()->attach(Permission::where('nom', 'groupe')->first()->id);
            }
            if ($request->has('candidat_full')) {
                $role->permissions()->attach(Permission::where('nom', 'candidat-$')->pluck('id'));
            } else if ($request->has('candidat_lecture')) {
                foreach ($request->candidat_lecture as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'candidat-lecture-' . $item)->first()->id);
                }
            }
            if ($request->has('user_lecture')) {
                foreach ($request->user_lecture as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-lecture-' . $item)->first()->id);
                }
            }
            if ($request->has('user_ecriture')) {
                foreach ($request->user_ecriture as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-lecture-' . $item)->first()->id);
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-ecriture-' . $item)->first()->id);
                }
            }

            if ($request->has('suivi_role')) {

                foreach ($request->suivi_role as $key => $item) {

                    if ($request->has('suivi_ecriture' . $key)) {
                        $role->roles()->attach($item, ['ecriture' => true]);
                    } else if ($request->has('suivi_responsable' . $key)) {
                        $responsable_onlyRole = Role::find($item);
                        $responsable_onlyRole->responsable = true;
                    } else {
                        $responsable_onlyRole = Role::find($item);
                        $responsable_onlyRole->responsable = false;
                    }
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
        $roles = Role::where('id', '!=', 1)->get();
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
            // 'suivi_role.*' => 'nullable|min:2,max:' . count(Role::all()),
        ]);

        $role->nom = $request->nom;
        $role->save();

        $role->roles()->detach();
        $role->permissions()->detach();
        if ($request->has('full')) {
            $role->roles()->attach(Role::where('id', '!=', 1)->pluck('id'), ['ecriture' => true]);
            foreach (Permission::all()->pluck('id') as $item) {
                $role->permissions()->attach($item);
            }
        } else if ($request->has('lecture')) {
            $role->roles()->attach(Role::where('id', '!=', 1)->pluck('id'), ['ecriture' => false]);
            foreach (Permission::where('nom', 'LIKE', '%lecture%')->pluck('id') as $item) {
                $role->permissions()->attach($item);
            }
        } else {
            if ($request->has('annonce')) {

                $role->permissions()->attach(Permission::where('nom', $request->annonce)->first()->id);
                if ($request->annonce == 'annonce_écriture') {
                    $role->permissions()->attach(Permission::where('nom', 'annonce-lecture')->first()->id);
                    $role->permissions()->attach(Permission::where('nom', 'annonce-ecriture')->first()->id);
                }
            }
            if ($request->has('contact')) {
                $role->permissions()->attach(Permission::where('nom', 'contact')->first()->id);
            }
            if ($request->has('groupe')) {
                $role->permissions()->attach(Permission::where('nom', 'groupe')->first()->id);
            }
            if ($request->has('candidat_full')) {
                $role->permissions()->attach(Permission::where('nom', 'candidat-$')->pluck('id'));
                $role->permissions()->attach(Permission::where('nom', 'candidat-full')->first()->id);
            } else {
                foreach ($request->candidat_lecture as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'candidat-lecture-' . $item)->first()->id);
                }
            }
            if ($request->has('user_lecture')) {
                foreach ($request->user_lecture as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-lecture-' . $item)->first()->id);
                }
            }
            if ($request->has('user_ecriture')) {
                foreach ($request->user_ecriture as $item) {
                    $role->permissions()->attach(Permission::where('nom', 'LIKE', 'user-ecriture-' . $item)->first()->id);
                }
            }
            if ($request->has('suivi_role')) {
                foreach ($request->suivi_role as $key => $item) {

                    if ($request->has('suivi_ecriture' . $key)) {
                        $role->roles()->attach($item, ['ecriture' => true]);
                    } else if ($request->has('suivi_lecture' . $key)) {

                        $role->roles()->attach($item, ['ecriture' => false]);
                    } else if ($request->has('suivi_responsable' . $key)) {
                        $responsable_onlyRole = Role::find($item);
                        $responsable_onlyRole->responsable = true;
                    } else {
                        $responsable_onlyRole = Role::find($item);
                        $responsable_onlyRole->responsable = false;
                    }
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
