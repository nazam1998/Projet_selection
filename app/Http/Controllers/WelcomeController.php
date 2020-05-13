<?php

namespace App\Http\Controllers;

use App\Evenement;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $evenements=Evenement::latest();
        
        return view('welcome');
    }
}
