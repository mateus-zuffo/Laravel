# Anotações

## Laravel 1/3

### Parte 1 - Módulos ✔
- [x] 01. Conhecendo o Laravel       
- [x] 02. MVC - Controllers          
- [x] 03. MVC - View                 
- [x] 04. MVC - Model                
- [x] 05. Lapidando a aplicação      
- [x] 06. Validando os dados         

Módulos e Palavras Chave:
01. Rotas; 02. Request; 03. View, Blade; 04. Migration, Eloquent; 05. Redirect, Flash message, Nomear rotas; 06. Validate, make request (para validar);

---

## Laravel 2/3

### Parte 2 - Módulos
- [x] 01. Relacionamento no modelo
- [x] 02. Novo controller e view 
- [x] 03. Usar serviços para exclusão 
- [x] 04. Edição da série 
- [x] 05. Assistindo Episódios 
- [ ] 06. Autenticando o usuário (Auth)
- [ ] 07. Protegendo rotas e ações (Middleware)
- [ ] 08. 4/16 Testes automatizados (PHPUnit)

Palavras Chave:
01. Relacionamento entre modelos, migrations

Criando modelo(make:model) e migration(-m) para o objeto:
<ul>
    <li> php artisan make:model Temporada -m </li>
    <li> php artisan make:model Episodio -m </li>
</ul>


Rodando as migrations
<ul>
    <li>php artisan migrate</li>
</ul>

criando um controller
<ul>
   <li> php artisan make:controller TemporadasController</ul>
</ul>

buscar uma série
<ul>
    <li> use App\Models\Serie; </li>
    <li> Serie::find($serieId)->temporadas; </li>
</ul>

garantir que uma transação de banco de dados dê certo (caso complexo de mais de uma transação):
    DB::transaction(function(){});
    DB::beginTransaction();
    DB::commit();

migration cria as regras para manipular a tabela: (tem que executar)
    php artisan make:migration nome_da_migration --table=tabela
executa as regras das migrations
    php artisan migrate

retornar para a última página
    return redirect()->back();
última atualização: 05/09/21

método filter foi criado dentro do model e depois teve um contador pra pegar a collection retornada por ele
    public function getEpisodiosAssistidos() : Collection
    {
        return $this->episodios->filter(function (Episodio $episodio){
            return $episodio->assistido;
        });
    }

//fudeo
    php artisan make:auth

---

A rota é chamada pelo caminho informado nela (pode ser por uma tela ou requisição), 
A rota chama o controller, 
O controller faz o que é necessário (cálculo, regra de negócio, etc) e retorna o que é esperado, podendo chamar a view/front passando as variáveis que usará, retornar nulo, etc
(se necessário o controller chama um service para executar uma ação mais complexa e o código não ficar inteiro no Controller)

---
## Laravel 3/3

---
