<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contactonot extends Mailable
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
        $this->informacion="Gracias por contactarte";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contactonot');
    }
}
