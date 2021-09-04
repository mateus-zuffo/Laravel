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
- [ ] 02. 3/6 Novo controller e view 
- [ ] 03. 0/11 Usar serviços para exclusão 
- [ ] 04. 0/6 Edição da série 
- [ ] 05. 0/14 Assistindo Episódios 
- [ ] 06. 0/11 Autenticando o usuário 
- [ ] 07. 0/9 Protegendo rotas e ações 
- [ ] 08. 0/16 Testes automatizados 

Palavras Chave:
01. Relacionamento entre modelos, migrations

Criando modelo(make:model) e migration(-m) para o objeto:
    php artisan make:model Temporada -m
    php artisan make:model Episodio -m

Rodando as migrations
    php artisan migrate

criando um controller
    php artisan make:controller TemporadasController

buscar uma série
    use App\Models\Serie;
    Serie::find($serieId)->temporadas;
última atualização: 02/09/21

---
## Laravel 3/3

---