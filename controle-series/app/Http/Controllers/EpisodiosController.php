<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Temporada,Episodio};

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada)
    {
        $episodios = $temporada->episodios;
        return view('episodios.index', compact('episodios'));
    }

    public function assistir(Temporada $temporada, Request $request) {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodio $episodio)
        use ($episodiosAssistidos)
        {
            $episodio->assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );
        });
    }
}
