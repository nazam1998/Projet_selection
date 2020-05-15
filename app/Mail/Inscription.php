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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titre,$user,$evenement)
    {
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name');
    }
}
