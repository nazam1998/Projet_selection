<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Afficher tout les membres du staff, càd tout le monde sauf les candidats et users 
    public function index()
    {
        $users = User::where('role_id', '!=', '1')->where('role_id', '!=', '6')->where('role_id', '!=', '7')->get();
        return view('backoffice.suivi.staff', compact('users'));
    }

    // Afficher un membre du staff précis et pouvoir lui écrire une note via le note controller
    
    public function show($id)
    {
        $user = User::find($id);
        return view('backoffice.suivi.staffShow', compact('user', 'notes'));
    }


    public function indexGroup($id)
    {
        $users = User::find($id);
        if ($users->role_id == 2) {
            $group = User::find($id);
        }
        return view('backoffice.suivi.staff', compact('users'));
    }

}
