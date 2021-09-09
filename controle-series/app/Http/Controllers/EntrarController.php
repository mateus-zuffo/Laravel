<?php

namespace App\Http\Controllers;

// use App\Http\Controller\Auth;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EntrarController extends Controller
{
    public function index()
    {
        return view('entrar.index');
    }
    
    public function entrar(Request $request)
    {
        if(Auth::attempt($request->only(['email', 'password']))){
            return redirect()->route('listar_series');
        } else{
            return redirect()->back()->withErrors('Usuário incorreto');
        }
    }

    public function teste(Request $request) {
        if (!Auth::check()) {
            echo "Não autenticado";
            exit();
    
        }
        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');
    
        return view('series.index', compact('series', 'mensagem'));
    }

    public function sair(){
        Auth::logout();
        return redirect()->route('entrar');
    }
        
}
