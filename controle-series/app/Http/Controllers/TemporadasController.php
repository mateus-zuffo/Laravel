<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        $temporadas = Serie::find($serieId)->temporadas;

        return view('temporadas.index', compact('temporadas'));
    }    
}
