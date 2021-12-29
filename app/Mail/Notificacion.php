<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notificacion extends Mailable
{
    use Queueable, SerializesModels;
     public $informacion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->informacion="Gracias por contactarnos!...
         En breve nos comunicaremos contigo";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notificacion');
    }
}
