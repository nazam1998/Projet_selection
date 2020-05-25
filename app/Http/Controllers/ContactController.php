<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
        $this->middleware('contact')->only('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        return view('backoffice/contact/index', compact('contact'));
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
            'noms' => 'required|string|unique:contacts',
            'prenoms' => 'required|string|unique:contacts',
            'email' => 'required|string|unique:contacts',
            'message' => 'required|string|unique:contacts',
        ]);

        $contact = new Contact();
        $contact->nom = $request->input('noms');
        $contact->prenom = $request->input('prenoms');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->save();

        $nom = $request->input('noms');
        $prenom =  $request->input('prenom');
        $email =  $request->input('email');
        $msg = $request->input('message');
        
        Mail::to('admin@admin.com')->send(new ContactMail($nom, $prenom, $email, $msg));

        return redirect()->to(url()->previous() . '#contact')->with('msgContact', 'Merci pour votre message');;
    }


}
