<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        $users=User::where('role_id','!=','6')->where('role_id','!=','7')->get();
        return view('backoffice.suivi.staff',compact('users'));
    }
}
