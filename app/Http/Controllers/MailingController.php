<?php

namespace App\Http\Controllers;

use App\Mail\MailingMail;
use App\Mailing;
use App\User;
use App\Role;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('contact');
        $mailings = Mailing::all();
        return view('backoffice.mail.index', compact('mailings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('contact');
        return view('backoffice.mailing.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request)
    {
        $this->authorize('contact');
        $request->validate([
            'message' => 'required|string',
            'user_id' => 'required|integer|nullable'
        ]);
        $mailing = new Mailing();
        $mailing->message = $request->message;
        $mailing->user_id = $request->user_id;
        $mailing->group_id = null;
        $mailing->role_id = null;
        $user = User::find($request->user_id);

        $nom = $user->nom;
        $prenom =  $user->prenom;
        $email =  $user->email;
        $msg = $request->message;
        $mailing->save();
        Mail::to($email)->send(new MailingMail($nom, $prenom, $msg));
        return redirect()->back()->with('msg', 'Message envoyé avec succès');
    }

    public function store(Request $request)
    {
        $this->authorize('contact');
        $request->validate([
            'message' => 'required|string',
            'group_id' => 'required_without:role_id|integer|nullable',
            'role_id' => 'required_without:group_id|integer|nullable',
        ]);
        $mailing = new Mailing();
        $mailing->message = $request->message;
        if ($request->has('role_id')) {
            $mailing->role_id = $request->role_id;
            $mailing->group_id = null;
            $mailing->user_id = null;
            $users = User::where('role_id', $request->role_id)->get();
        } else {
            $mailing->group_id = $request->group_id;
            $mailing->role_id = null;
            $mailing->user_id = null;
            $users = Group::find($request->group_id)->users;
        }
        foreach ($users as $value) {
            $nom = $value->nom;
            $prenom =  $value->prenom;
            $email =  $value->email;
            $msg = $request->message;
            Mail::to($email)->send(new MailingMail($nom, $prenom, $msg));
        }
        $mailing->save();
        return redirect()->back()->with('msg', 'Message envoyé avec succès');
    }


    public function role()
    {
        $this->authorize('contact');
        $roles = Role::all();
        return view('backoffice.mail.formRole', compact('roles'));
    }
    public function personne()
    {
        $this->authorize('contact');
        $users = User::all();
        return view('backoffice.mail.formPersonne', compact('users'));
    }
    public function group()
    {
        $this->authorize('contact');
        $groups = Group::all();
        return view('backoffice.mail.formGroup', compact('groups'));
    }
}
