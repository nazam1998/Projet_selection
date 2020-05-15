<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'statut' => ['required', 'string', 'max:255'],
            'commune' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'objectif' => ['required', 'string', 'max:255'],
            'photo'=>['required','image'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if(count(User::all()) == 0){
            $role = 1;
        }else{
            $role = 7;
        }
        $image=Storage::disk('public')->put('',$data['photo']);
        $user= User::create([
                'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'genre' => $data['genre'],
            'statut' => $data['statut'],
            'commune' => $data['commune'],
            'adresse' => $data['adresse'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'ordinateur' => isset($data['ordinateur']),
            'objectif' => $data['objectif'],
            'photo' => $image,
            'abo' => isset($data['abo']),
            'evenement_id' => $data['evenement_id'],
            'role_id' => $role,
            
        ]);
        $user->interets()->attach($data['interet']);
        return $user;
    }
}
