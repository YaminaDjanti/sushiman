<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageCreated extends Mailable
{
    use Queueable, SerializesModels;
    public $nom;
    public $email;
    public $messageSubject;
    public $textMessage;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom,$email,$messageSubject,$textMessage)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->messageSubject = $messageSubject;
        $this->textMessage = $textMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.messages.created');
    }
}
