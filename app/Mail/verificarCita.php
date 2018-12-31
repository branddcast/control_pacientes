<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class verificarCita extends Mailable
{
    use Queueable, SerializesModels;
    public $especialista, $cita;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($especialista, $cita)
    {
        $this->especialista = $especialista;
        $this->cita = $cita;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.verifyDate');
    }
}
