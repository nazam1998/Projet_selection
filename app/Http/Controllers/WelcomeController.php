<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Annonce;
use App\Evenement;
=======
// use App\Annonce;
// use App\Evenement;
>>>>>>> badGit
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $evenements = Evenement::latest();
        $annonce = Annonce::first();
        return view('welcome', compact('annonce'));
=======
        // $evenements = Evenement::latest();
        // $annonce = Annonce::first();
        return view('welcome');
>>>>>>> badGit
    }
}
