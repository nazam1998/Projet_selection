<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Evenement;
use App\Interet;
use App\Mail\Inscription;
use App\Phrase;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('isEnCours')->only('create', 'register');
    }
    public function index(Request $request)
    {
        
        $evenements = Evenement::orderBy('date', 'asc')->where('etat', '!=', 'Terminé')->whereHas('etapes')->paginate(3);
        $form = Evenement::orderBy('date', 'asc')->whereHas('etapes')->where('etat', 'En cours')->get();
        $annonce = Annonce::all();
        $phrase = Phrase::all();
        $interets = Interet::all();
        $coachs=User::inRandomOrder()->where('role_id',5)->take(3)->get();

        return view('welcome', compact('interets', 'annonce', 'evenements', 'form', 'phrase','coachs'));
    }

    public function register(Request $data, $id)
    {
        $validator = Validator::make($data->all(), [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'statut' => ['required', 'string', 'max:255'],
            'commune' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'digits_between:10,11'],
            'objectif' => ['required', 'string', 'max:255'],
            'photo' => ['required', 'image'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect()->to(url()->previous().'#formulaire')->withErrors($validator)->withInput();
        }
        if (count(User::all()) == 0) {
            $role = 1;
        } else {
            $role = 7;
        }

        $image = Storage::disk('public')->put('', $data->photo);
        $user = new User();

        $user->prenom = $data->prenom;
        $user->nom = $data->nom;
        $user->email = $data->email;
        $user->genre = $data->genre;
        $user->statut = $data->statut;
        $user->commune = $data->commune;
        $user->adresse = $data->adresse;
        $user->email = $data->email;
        $user->telephone = $data->telephone;
        $user->ordinateur = $data->has('ordinateur');
        $user->objectif = $data->objectif;
        $user->photo = $image;
        $user->abo = $data->has('abo');
        $user->evenement_id = $id;
        $user->role_id = $role;
        do {
            $password = Str::random(8);
        } while (User::where('password', $password)->first());
        $user->password = Hash::make($password);
        $user->save();
        $user->interets()->attach($data->interet);
        $evenement = Evenement::find($id);

        Mail::to($data->email)->send(new Inscription($evenement->formulaire->titre, $user, $evenement, $password));
        return redirect()->to(url()->previous().'#formulaire')->with('msg', 'Merci pour votre insciption');
    }

    public function create($id)
    {
        $form = Evenement::where('id', $id)->get();
        return view('inscription', compact('form'));
    }
}
