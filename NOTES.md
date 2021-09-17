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
- [x] 02. Envio de e-mail
- [x] 03. Processando dados com filas
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
    <li> 06. Validate</li>
</ul>


### Parte 2

Criando modelo(make:model) e migration(-m) para o objeto:
- php artisan make:model Temporada -m 
- php artisan make:model Episodio -m 


Rodando as migrations
- php artisan migrate

Criando um controller
- php artisan make:controller TemporadasController
       
Buscar uma série
- use App\Models\Serie;
- Serie::find($serieId)->temporadas;

Garantir que uma transação de banco de dados dê certo (caso complexo de mais de uma transação):
- DB::transaction(function(){});
- DB::beginTransaction();
- DB::commit();
      
Migration cria as regras para manipular a tabela: (tem que executar)
- php artisan make:migration nome_da_migration --table=tabela

Executa as regras das migrations
- php artisan migrate

Retornar para a última página
- return redirect()->back();

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

Criar teste
- php artisan make:test nome --unit
- return redirect()->back();  

Usar o Hash para criptografar
- Hash::make($var);     
        
Rodar teste
- vendo\bin\phpunit
      

A rota é chamada pelo caminho informado nela (pode ser por uma tela ou requisição), 
A rota chama o controller, 
O controller faz o que é necessário (cálculo, regra de negócio, etc) e retorna o que é esperado, podendo chamar a view/front passando as variáveis que usará, retornar nulo, etc
(se necessário o controller chama um service para executar uma ação mais complexa e o código não ficar inteiro no Controller)

---

### Parte 3
Criar tabela para usar como fila
    php artisan queue:table
    php artisan migrate

-
Verificar lista de tarefas
    dev: php artisan queue:listen
    prod: php artisan queue:work

Verificar lista de tarefas que falharam
    php artisan queue:failed

Reexecutar as tarefas que falharam
    php artisan queue:retry ID
    php artisan queue:retry all


Verificar BD
    php artisan tinker
    \DB::select('Select * from TABELA');

Criar evento
    php artisan make:event NOME_DO_EVENTO

---
### Última atualização: 16/09/21

