<?php

namespace App\Http\Controllers;

use App\Group;
use App\Matiere;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Affiche tous les student et candidats
    public function index()
    {
        $groups = Group::all();
        $users = User::where('role_id', 6)->get();
        return view('backoffice.suivi.student', compact('users', 'groups'));
    }

    // Permet de voir le suivi d'un student précis et pouvoir lui écrire une note

    public function show($id)
    {
        $user = User::find($id);
        return view('backoffice.suivi.studentShow', compact('user'));
    }

    // permet de valider la matière d'un student
    public function valider(Request $request, $id, $matiere)
    {
        $user = User::find($id);
        $user->matieres()->updateExistingPivot($matiere, ['valide' => true]);
        return redirect()->back()->with('valide', 'La matière a été validée');
    }

    // Permet de filtrer les student par groupe
    public function indexGroup(Request $request)
    {
        if ($request->has('group')) {

            $groups = Group::whereIn('id', $request->group)->get();
            $users = $groups->pluck('users')->where('role_id', 6);
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
            $users = User::where('role_id', 6)->get();
        }

        return view('backoffice.suivi.student', compact('users', 'groups'));
    }
    // Permet de modifier un student ou candidat
    public function edit($id)
    {
        $user = User::find($id);
        $matieres = Matiere::all();
        $groups = Group::all();
        return view('backoffice.suivi.editStudent', compact('user', 'groups', 'matieres'));
    }


    public function addMatiere($id)
    {
        $user = User::find($id);
        $matieres = Matiere::all();
        return view('backoffice.suivi.formMatiere', compact('user', 'matieres'));
    }

    public function saveMatiere(Request $request, $id)
    {
        $request->validate([
            'matiere.*' => 'required|integer',
        ]);

        $user = User::find($id);

        $user->matieres()->detach();
        $user->matieres()->attach($request->matiere, ['valide' => false]);

        return redirect()->route('student.show', $id)->with('msg', 'Le student a été modifié avec succès');
    }
}
