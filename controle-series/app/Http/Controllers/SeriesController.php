<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Mail\NovaSerie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use App\Http\Controllers\EmailController;
use App\Models\{Serie, Temporada, Episodio};

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

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {
        $nome = $request->nome;
        $qtd_temporadas = $request->qtd_temporadas;
        $ep_por_temporada = $request->ep_por_temporada;

        $serie = $criadorDeSerie->criarSerie(
            $nome, 
            $qtd_temporadas, 
            $ep_por_temporada
        );
        $request->session()
            ->flash(
                'mensagem',
                "Série {$nome} com {$qtd_temporadas} temporadas e {$ep_por_temporada} episódios criados com sucesso"
            );    
        $email = new EmailController();
        $subject = 'Nova série adicionada';
        $email->enviaEmail($nome,$qtd_temporadas,$ep_por_temporada,$subject);
        
        return redirect()->route('listar_series');
    }
    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie) 
        {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
    
        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso"
            );
            
        return redirect()->route('listar_series');
    }

    public function editaNome(int $id, Request $request) {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
