<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EquipoNuevo extends Mailable
{
    use Queueable, SerializesModels;
    public $subject='Nuevo Equipo';

    public $NombreEquipo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($NombreEquipo)
    {
        $this->NombreEquipo=$NombreEquipo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.equiponuevo');
    }
}
