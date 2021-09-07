<?php

namespace App\Http\Controllers;

use App\Http\Controller\Auth;
use Illuminate\Http\Request;

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

    public function sair(){
        return view('entrar.index');
    }
        
}
