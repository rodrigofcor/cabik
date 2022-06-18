<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $phone;
    public $pet;
    public $name;
    public $tutor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $phone, $pet, $name, $tutor)
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->pet = $pet;
        $this->name = $name;
        $this->tutor = $tutor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cabik@cabik.org')->markdown('mail.contact');
    }
}
