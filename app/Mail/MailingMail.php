<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailingMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $prename;
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom, $prenom, $msg)
    {
        $this->name = $nom;
        $this->prename = $prenom;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mailing', compact('name', 'prename', 'mail', 'msg'));
    }
}
