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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('backoffice.mailing.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'group_id' => 'required_without: user_id,role_id|integer|nullable',
            'role_id' => 'required_without: user_id,group_id|integer|nullable',
            'user_id' => 'required_without: group_id,role_id|integer|nullable'
        ]);
        $mailing = new Mailing();
        $mailing->message = $request->message;
        if ($request->has('role_id')) {
            $mailing->role_id = $request->role_id;
            $users = User::where('role_id', $request->role_id)->get();
        } else if ($request->has('group_id')) {
            $mailing->group_id = $request->group_id;
            $users = User::where('group_id', $request->group_id)->get();
        } else {
            $mailing->user_id = $request->user_id;
            $user = User::find($request->user_id);
        }

        if ($request->has('user_id')) {
            $nom = $user->nom;
            $prenom =  $user->prenom;
            $email =  $user->email;
            $msg = $request->message;
            Mail::to($email)->send(new MailingMail($nom, $prenom, $msg));
        } else {
            foreach ($users as $value) {
                $nom = $value->nom;
                $prenom =  $value->prenom;
                $email =  $value->email;
                $msg = $request->message;
                Mail::to($email)->send(new MailingMail($nom, $prenom, $msg));
            }
        }
        $mailing->save();
        return redirect()->back()->with('msg', 'Message envoyé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mailing  $mailing
     * @return \Illuminate\Http\Response
     */
    public function show(Mailing $mailing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mailing  $mailing
     * @return \Illuminate\Http\Response
     */
    public function edit(Mailing $mailing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mailing  $mailing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mailing $mailing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mailing  $mailing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mailing $mailing)
    {
        //
    }
    public function role()
    {
        $roles = Role::all();
        return view('backoffice.mail.formRole', compact('roles'));
    }
    public function personne()
    {
        $users = User::all();
        return view('backoffice.mail.formPersonne', compact('users'));
    }
    public function group()
    {
        $groups = Group::all();
        return view('backoffice.mail.formGroup', compact('groups'));
    }
}
