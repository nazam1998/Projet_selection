<?php

namespace App\Http\Controllers;

use App\Group;
use App\Matiere;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('student')->only('edit', 'update', 'show', 'valider', 'invalider', 'addMatiere', 'saveMatiere');
        $this->middleware('suivi')->only('index', 'indexGroup');
        $this->middleware('suivi-lecture')->only('show');
        $this->middleware('suivi-ecriture')->only('edit', 'update', 'destroy');
    }

    // Affiche tous les student et candidats
    public function index()
    {
        $groups = Group::all();
        $users = User::withTrashed()->where('role_id', 6)->get();
        return view('backoffice.suivi.student', compact('users', 'groups'));
    }

    // Permet de voir le suivi d'un student précis et pouvoir lui écrire une note

    public function show($user)
    {
        $user = User::withTrashed()->whereId($user)->first();
        return view('backoffice.suivi.studentShow', compact('user'));
    }

    // permet de valider la matière d'un student
    public function valider(Request $request, User $user, $matiere)
    {
        $user->matieres()->updateExistingPivot($matiere, ['valide' => true]);
        return redirect()->back()->with('valide', 'La matière a été validée');
    }

    // permet de valider la matière d'un student
    public function invalider(Request $request, User $user, $matiere)
    {
        $user->matieres()->updateExistingPivot($matiere, ['valide' => false]);
        return redirect()->back()->with('valide', 'La matière a été invalidée');
    }

    // Permet de filtrer les student par groupe
    public function indexGroup(Request $request)
    {
        if ($request->has('group')) {

            $groups = Group::whereIn('id', $request->group)->get();
            $users = $groups->pluck('users');
            $groups = Group::all();
            $related = $users->first();
            if ($users->first()) {
                foreach ($users as $tag) {
                    $related = $related->merge($tag);
                }
                $users = $related->where('role_id', 6);
            }
        } else {
            $groups = Group::all();
            $users = User::where('role_id', 6)->get();
        }

        return view('backoffice.suivi.student', compact('users', 'groups'));
    }
    // Permet de modifier un student ou candidat
    public function edit(User $user)
    {
        // $user = User::find($id);
        $matieres = Matiere::all();
        $groups = Group::all();
        $roles = Role::all();
        return view('backoffice.suivi.editStudent', compact('user', 'groups', 'matieres', 'roles'));
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
        return redirect()->route('student.index')->with('msg', 'Student modifié avec succés !');;
    }

    public function addMatiere(User $user)
    {
        $matieres = Matiere::all();
        return view('backoffice.suivi.formMatiere', compact('user', 'matieres'));
    }

    public function saveMatiere(Request $request, User $user)
    {
        $request->validate([
            'matiere.*' => 'required|integer',
        ]);
        $user->matieres()->detach();
        $user->matieres()->attach($request->matiere, ['valide' => false]);

        return redirect()->route('student.show', $user->id)->with('msg', 'Le student a été modifié avec succès');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }

    public function forceDestroy($user)
    {

        $user = User::withTrashed()->whereId($user)->first();
        $user->forceDelete();
        return redirect()->back()->with('msg', 'Le student a été supprimé définitivement avec succès');
    }

    public function restore($user)
    {

        $user = User::withTrashed()->whereId($user)->first();
        $user->restore();
        return redirect()->back()->with('msg', 'Le student a été restauré avec succès');
    }
}
