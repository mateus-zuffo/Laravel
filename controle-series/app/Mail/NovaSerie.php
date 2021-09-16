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
    public $subject;

    public function __construct($nome,$qtDeTemporadas,$qtDeEpisodios, $subject)
    {
        $this->nome           = $nome;
        $this->qtDeTemporadas = $qtDeTemporadas;
        $this->qtDeEpisodios  = $qtDeEpisodios;
        $this->$subject       = $subject;
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
