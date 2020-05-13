<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $prename;
    public $mail;
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom, $prenom, $email, $msg)
    {
        $this->name = $nom;
        $this->prename = $prenom;
        $this->mail = $email;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->mail)->subject("Accusé de réception")->view('mails.contactMail', compact('name', 'prename', 'mail', 'msg'));
    }
}
