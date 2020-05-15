<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Evenement;
use App\Interet;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $evenements = Evenement::latest()->where('etat','En cours')->whereHas('etapes')->get();
        $annonce = Annonce::first();
        $interets=Interet::all();
        return view('welcome',compact('interets','annonce','evenements'));
    }
}
