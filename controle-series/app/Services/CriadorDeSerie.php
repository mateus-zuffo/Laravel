<?php

namespace App\Services;

use App\Models\Serie;
use NunoMaduro\Collision\Adapters\Phpunit\TestResult;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporada, int $epPorTemporada) : Serie
    {
        $serie = Serie::create(['nome' => $nomeSerie]);
        $qtdTemporadas = $qtdTemporada;
        for ($i = 0; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
    
            for ($j = 1; $j <= $epPorTemporada; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
            
        }
    
        return $serie;
    
    }
}