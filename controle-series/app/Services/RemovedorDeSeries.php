<?php

namespace App\Services;

use App\Models\{Serie,Temporada,Episodio};

class RemovedorDeSeries
{
    public function removerSerie(int $serieId):string { 
        $serie = Serie::find($serieId);
        $nomeSerie = $serie->nome;
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios()->each(function(Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
        });
        $serie->delete();
        return $nomeSerie;
    }
}