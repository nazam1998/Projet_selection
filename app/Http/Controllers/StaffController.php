<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', '6')->where('role_id', '!=', '7')->get();
        return view('backoffice.suivi.staff', compact('users'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('backoffice.suivi.staffShow', compact('user', 'notes'));
    }
    public function indexGroup($id)
    {
        $users = User::where('role_id', '!=', '6')->where('role_id', '!=', '7')->where('group_id', $id)->get();
        return view('backoffice.suivi.staff', compact('users'));
    }
}
