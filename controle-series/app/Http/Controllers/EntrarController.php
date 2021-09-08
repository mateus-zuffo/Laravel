<?php

namespace App\Http\Controllers;

// use App\Http\Controller\Auth;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index()
    {
        return view('entrar.index');
    }
    
    public function entrar(Request $request)
    {
        $request->only(['email', 'password']);
        $email = $request->email;
        $password = $request->password;
        if($this->AutenticacaoFalsa($email,$password)){
            return redirect()->route('listar_series');
        } else{
            return redirect()->back()->withErrors('Usuário incorreto');
        }
    }

    public function AutenticacaoFalsa(string $email, string $password)
    {
        $autenticacao = false;
        if($email == 'teste@gmail.com' && $password == '1'){
            $autenticacao = true;
        }
        return $autenticacao;
        
    }

    public function Autenticacao(string $email, string $password){
        Auth::attempt(['email' => $email, 'password' => $password]);
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
        return view('entrar.index');
    }
        
}
