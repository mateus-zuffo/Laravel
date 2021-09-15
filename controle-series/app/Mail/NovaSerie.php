<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovaSerie extends Mailable
{
    use Queueable, SerializesModels;
    public $nome;
    public $qtDeTemporadas;
    public $qtDeEpisodios;

    public function __construct($nome,$qtDeTemporadas,$qtDeEpisodios)
    {
        $this->nome          = $nome;
        $this->qtDeTemporadas = $qtDeTemporadas;
        $this->qtDeEpisodios  = $qtDeEpisodios;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.novaserie');
    }
}
