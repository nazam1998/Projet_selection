<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    // Afficher tout les membres du staff, càd tout le monde sauf les candidats et users 
    public function index()
    {
        $groups = Group::all();
        $users = User::withTrashed()->where('role_id', '!=', 1)->where('role_id', '!=', 6)->where('role_id', '!=', 7)->whereHas('group')->get();
        return view('backoffice.suivi.staff', compact('users', 'groups'));
    }

    // Afficher un membre du staff précis et pouvoir lui écrire une note via le note controller

    public function show($id)
    {

        $user = User::find($id);
        return view('backoffice.suivi.staffShow', compact('user', 'notes'));
    }

    public function edit(User $user)
    {
        $groups = Group::all();
        $roles = Role::all();
        return view('backoffice.suivi.editStaff', compact('user', 'groups', 'roles'));
    }

    public function update(Request $request, User $user){
        $validator = Validator::make($request->all(), [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'statut' => ['required', 'string', 'max:255'],
            'commune' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'objectif' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image'],
            'role_id' => ['required', 'integer'],
            'group' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('photo')) {
            if (Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }
            $image = Storage::disk('public')->put('', $request->photo);
            $user->photo = $image;
        }

        $user->prenom = $request->prenom;
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->genre = $request->genre;
        $user->statut = $request->statut;
        $user->commune = $request->commune;
        $user->adresse = $request->adresse;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->ordinateur = $request->has('ordinateur');
        $user->objectif = $request->objectif;

        $user->abo = $request->has('abo');
        $user->role_id = $request->role_id;
        $user->group()->detach();
        $user->group()->attach($request->group, ['role_id' => $user->role_id]);

        $user->save();
        return redirect()->route('user')->with('msg', 'Staff modifié avec succés !');;
    }

    public function indexGroup(Request $request)
    {
        if ($request->has('group')) {

            $groups = Group::whereIn('id', $request->group)->get();
            $users = $groups->pluck('users')->where('role_id', '!=', 1)->where('role_id', '!=', 6)->where('role_id', '!=', 7);
            $groups = Group::all();
            $related = $users->first();
            if ($users->first()) {

                foreach ($users as $tag) {
                    $related = $related->merge($tag);
                }
                $users = $related;
            }
        } else {
            $groups = Group::all();
            $users = User::where('role_id', '!=', 1)->where('role_id', '!=', 6)->where('role_id', '!=', 7)->get();
        }

        return view('backoffice.suivi.staff', compact('users', 'groups'));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->back();
    }

    public function forceDestroy($user)
    {
        $user = User::withTrashed()->whereId($user)->first();
        $user->forceDelete();
        return redirect()->back()->with('msg', 'Le staff a été supprimé définitivement avec succès');
    }

    public function restore($user)
    {
        $user = User::withTrashed()->whereId($user)->first();
        $user->restore();
        return redirect()->back()->with('msg', 'Le staff a été restauré avec succès');
    }
}
