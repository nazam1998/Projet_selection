<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Inscription extends Mailable
{
    use Queueable, SerializesModels;
    public $titre;
    public $user;
    public $evenement;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titre, $user, $evenement,$password)
    {
        $this->titre = $titre;
        $this->user = $user;
        $this->evenement = $evenement;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@email.com')->markdown('mails.inscription', ['titre'=>$this->titre, 'user'=>$this->user, 'evenement'=>$this->evenement,'password'=>$this->password]);
    }
}
