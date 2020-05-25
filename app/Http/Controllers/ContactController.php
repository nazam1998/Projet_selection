<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'noms' => 'required|string',
            'prenoms' => 'required|string',
            'emails' => 'required|email|unique:contacts',
            'messages' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->to(url()->previous() . '#contact')->withErrors($validator)->withInput();
        }

        $contact = new Contact();
        $contact->nom = $request->input('noms');
        $contact->prenom = $request->input('prenoms');
        $contact->email = $request->input('emails');
        $contact->message = $request->input('messages');
        $contact->save();

        $nom = $request->input('noms');
        $prenom =  $request->input('prenoms');
        $email =  $request->input('emails');
        $msg = $request->input('messages');
        
        Mail::to('admin@admin.com')->send(new ContactMail($nom, $prenom, $email, $msg));

        return redirect()->to(url()->previous() . '#contact')->with('msgContact', 'Merci pour votre message');;
    }


}
