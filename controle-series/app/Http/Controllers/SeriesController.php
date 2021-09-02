<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Serie::all()->sortBy('nome');
        $mensagem = $request->session()->get(key: 'mensagem');
    
        return view('series.index', compact('series', 'mensagem'));        
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());   
        $request->session()
        ->flash(
            'mensagem', 
            "Série {$serie->id} criada com sucesso {$serie->nome}"
        );
        return redirect('/series');
    }

    public function destroy(Request $request)
    {
        echo $request->id;
    }
}
