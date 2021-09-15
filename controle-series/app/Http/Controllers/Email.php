<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NovaSerie;
use Illuminate\Support\Facades\Mail;

class Email extends Controller
{
    public function visualizandoEmail(){
        $nome = 'Arrow';
        $qtTemporadas = '5';
        $qtEpisodios = '5';

        return new NovaSerie($nome,$qtTemporadas,$qtEpisodios);
    }

    public function enviaEmail()
    {  
        $user = (object)[
            'email' => 'mateushmdz@gmail.com',
            'name' => 'Mateus'
        ];
        $email = $this->visualizandoEmail();

        Mail::to($user)->send($email);

        return 'Email enviado';
    }

}
