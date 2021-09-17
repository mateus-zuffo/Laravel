<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NovaSerie;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function enviaEmail($nome,$qtTemporadas,$qtEpisodios,$subject,$tempo, $user = null)
    {  
        if($user == null){
            $user = (object)[
                'email' => 'mateushmdz@gmail.com',
                'name' => 'Mateus'
            ];
        }
        $email = new NovaSerie($nome,$qtTemporadas,$qtEpisodios,$subject);
        $email->subject = $subject;
        $temporizador = now()->addSeconds($tempo*10);
        Mail::to($user)->later($temporizador, $email);

        return 'Email enviado';
    }

}
