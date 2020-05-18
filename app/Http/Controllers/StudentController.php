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
        $users = User::where('role_id', '6')->orWhere('role_id', '7')->get();
        return view('backoffice.suivi.student', compact('users'));
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
    public function indexGroup($id)
    {
        $user = User::where('role_id', '6')->orWhere('role_id', '7')->where('group_id', $id)->get();
        return view('backoffice.suivi.student', compact('users'));
    }
    // Permet de modifier un student ou candidat
    public function edit($id){
        $user= User::find($id);
        $matieres=Matiere::all();
        $groups=Group::all();
        return view('backoffice.suivi.editStudent',compact('user','groups','matieres'));
    }


    public function addMatiere($id){
        $user=User::find($id);
        $matieres=Matiere::all();
        return view('backoffice.suivi.formMatiere', compact('user', 'matieres'));
    }

    public function saveMatiere(Request $request, $id){
        $request->validate([
            'matiere.*'=>'required|integer',
        ]);

        $user=User::find($id);
        
        $user->matieres()->detach();
        $user->matieres()->attach($request->matiere, ['valide'=>false]);

        return redirect()->route('student.show', $id)->with('msg','Le student a été modifié avec succès');
    }

}
