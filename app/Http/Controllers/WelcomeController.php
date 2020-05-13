<?php

namespace App\Http\Controllers;

// use App\Annonce;
// use App\Evenement;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // $evenements = Evenement::latest();
        // $annonce = Annonce::first();
        return view('welcome');
    }
}
