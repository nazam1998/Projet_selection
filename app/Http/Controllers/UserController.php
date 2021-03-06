<?php

namespace App\Http\Controllers;

use App\Group;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin')->only('destroy');
        $this->middleware('user-lecture')->only('index');
        $this->middleware('user-ecriture')->only('edit', 'update');
    }
    public function index()
    {
        $users = User::withTrashed()->get();
        return view('backoffice.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $groups = Group::all();
        $roles = Role::all();
        return view('backoffice.user.edit', compact('user', 'groups', 'roles'));
    }

    public function update(Request $request, User $user)
    {

        $validator = Validator::make($request->all(), [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'statut' => ['required', 'string', 'max:255'],
            'commune' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'digits_between:9,11'],
            'objectif' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image'],
            'role_id' => ['required', 'integer', $user->role_id == 1 && count(User::where('role_id', 1)->get()) == 1 ? 'max:1' : ''],
            'group' => [$request->role_id > 5 && $request->role_id < 7 ? 'required' : 'nullable', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
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
        return redirect()->route('users.index')->with('msg', 'User modifié avec succés !');;
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }

    public function forceDestroy($users)
    {
        $users = User::withTrashed()->whereId($users)->first();
        $users->forceDelete();
        return redirect()->back()->with('msg', 'Le staff a été supprimé définitivement avec succès');
    }

    public function restore($users)
    {
        $users = User::withTrashed()->whereId($users)->first();
        $users->restore();
        return redirect()->back()->with('msg', 'Le staff a été restauré avec succès');
    }
}
