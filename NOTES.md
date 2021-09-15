# Acompanhamento
## Laravel 1/3

### Parte 1 - Módulos ✔
- [x] 01. Conhecendo o Laravel       
- [x] 02. MVC - Controllers          
- [x] 03. MVC - View                 
- [x] 04. MVC - Model                
- [x] 05. Lapidando a aplicação      
- [x] 06. Validando os dados         

---
## Laravel 2/3

### Parte 2 - Módulos ✔
- [x] 01. Relacionamento no modelo
- [x] 02. Novo controller e view 
- [x] 03. Usar serviços para exclusão 
- [x] 04. Edição da série 
- [x] 05. Assistindo Episódios 
- [x] 06. Autenticando o usuário
- [x] 07. Protegendo rotas e ações (Middleware)
- [x] 08. Testes automatizados (PHPUnit)


## Laravel 3/3

### Parte 3 - Módulos
- [x] 01. Template de e-mail
- [ ] 02. Envio de e-mail
- [ ] 03. Processando dados com filas
- [ ] 04. Trabalhando com eventos
- [ ] 05. Upload de arquivos
- [ ] 06. Usando jobs


# Anotações

### Parte 1
<ul>
    <li> 01. Rotas</li>
    <li> 02. Request</li>
    <li> 03. View, Blade</li>
    <li> 04. Migration, Eloquent</li>
    <li> 05. Redirect, Flash message, Nomear rotas</li>
    <li>  06. Validate</li>
</ul>


### Parte 2
<ol>
<li>
    Criando modelo(make:model) e migration(-m) para o objeto:
    <ul>
        <li> php artisan make:model Temporada -m </li>
        <li> php artisan make:model Episodio -m </li>
    </ul>
</li>
<li>
    Rodando as migrations
    <ul>
        <li>php artisan migrate</li>
    </ul>
</li>    
<li>
    Criando um controller
    <ul>
        <li> php artisan make:controller TemporadasController</ul>
    </ul>        
</li>       
<li>
    Buscar uma série
    <ul>
        <li> use App\Models\Serie; </li>
        <li> Serie::find($serieId)->temporadas; </li>
    </ul>       
</li>       
<li>
    Garantir que uma transação de banco de dados dê certo (caso complexo de mais de uma transação):
    <ul>
        <li> DB::transaction(function(){});</li>
        <li> DB::beginTransaction();</li>
        <li> DB::commit();</li>
    </ul>       
</li>       
<li>
    Migration cria as regras para manipular a tabela: (tem que executar)
    <ul>
        <li> php artisan make:migration nome_da_migration --table=tabela</li>
    </ul>       
</li>       
<li>
    Executa as regras das migrations
    <ul>
        <li>php artisan migrate</li>
    </ul>       
</li>       
<li>
    Retornar para a última página
    <ul>
        <li> return redirect()->back();</li>
    </ul>       
</li>       
<li>
    Método filter foi criado dentro do model e depois teve um contador pra pegar a collection retornada por ele
    <ul>
        <li> 
            public function getEpisodiosAssistidos() : Collection
            {
                return $this->episodios->filter(function (Episodio $episodio){
                    return $episodio->assistido;
                });
            }
        </li>
    </ul>       
</li>       
<li>
    Criar teste
        php artisan make:test nome --unit
    <ul>
        <li> return redirect()->back();</li>
    </ul>       
</li>       
<li>
    Usar o Hash para criptografar
    <ul>
        <li> Hash::make($var);</li>
    </ul>       
</li>       
<li>            
    Rodar teste
    <ul>
        <li> vendo\bin\phpunit</li>
    </ul>       
</li>       
</ol>

A rota é chamada pelo caminho informado nela (pode ser por uma tela ou requisição), 
A rota chama o controller, 
O controller faz o que é necessário (cálculo, regra de negócio, etc) e retorna o que é esperado, podendo chamar a view/front passando as variáveis que usará, retornar nulo, etc
(se necessário o controller chama um service para executar uma ação mais complexa e o código não ficar inteiro no Controller)

---

### Parte 3


---
### Última atualização: 13/09/21

