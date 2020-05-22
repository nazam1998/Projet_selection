<?php

namespace App\Http\Controllers;

use App\Group;
use App\Mail\PasswordMail;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CandidatController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->where('role_id', 7)->paginate(10);
        return view('backoffice.candidat.index', compact('users'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backoffice.candidat.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $groups = Group::all();
        $roles = Role::all();
        return view('backoffice.candidat.edit', compact('user', 'groups', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
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
        return redirect()->route('candidat.show', $user->id)->with('msg', 'Candidat modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('msg', 'Le candidat a été supprimé avec succès');
    }

    public function forceDestroy($user)
    {
        $user = User::withTrashed()->whereId($user)->first();
        $user->forceDelete();
        return redirect()->back()->with('msg', 'Le candidat a été supprimé définitivement avec succès');
    }

    public function restore($user)
    {
        $user = User::withTrashed()->whereId($user)->first();
        $user->restore();
        return redirect()->back()->with('msg', 'Le candidat a été restauré avec succès');
    }
}
