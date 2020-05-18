<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Afficher tout les membres du staff, càd tout le monde sauf les candidats et users 
    public function index()
    {
        $groups = Group::all();
        $users = User::where('role_id', '!=', '1')->where('role_id', '!=', '6')->where('role_id', '!=', '7')->whereHas('group')->get();
        return view('backoffice.suivi.staff', compact('users', 'groups'));
    }

    // Afficher un membre du staff précis et pouvoir lui écrire une note via le note controller

    public function show($id)
    {

        $user = User::find($id);
        return view('backoffice.suivi.staffShow', compact('user', 'notes'));
    }

    public function edit($id)
    {
    }


    public function indexGroup(Request $request)
    {
        if ($request->has('group')) {

            $groups = Group::whereIn('id', $request->group)->get();
            $users = $groups->pluck('users')->where('role_id', '!=', '1')->where('role_id', '!=', '6')->where('role_id', '!=', '7');
            $groups = Group::all();
        } else {
            $groups = Group::all();
            $users = $groups->pluck('users')->where('role_id', '!=', '1')->where('role_id', '!=', '6')->where('role_id', '!=', '7');
        }
        $related = $users->first();
        foreach ($users as $tag) {
            $related = $related->merge($tag);
        }
        $users = $related;
        return view('backoffice.suivi.staff', compact('users', 'groups'));
    }
}
