## Sobre o projeto

Esse projeto foi desenvolvido para realizar o teste técnico da empresa TECNOFIT.

Foi escolhido o framework **Laravel** para desenvolvimento da API REST.

Também estamos utilizando a versão 8.0 do PHP juntamente com a versão 9.0 do Laravel.

## Pendencias do projeto

>- PHP: Versão 8.0
>- Laravel: Versão 9.0
>- Composer: 2.7.7 (Qualquer versão da 2 geração)

## Inicialização do projeto com DOCKER

>Antes de subir o container com o projeto, iremos seguir um passo a passo padrão do Laravel, sendo ele:
>- Vamos instalar todas as dependencias com o comando: "**composer install**"

>Logo em seguida iremos criar o ambiente desse projeto com o DOCKER. Para inicializarmos, iremos utilizar o seguinte comando no terminal do projeto:
>- **docker-compose up -d**

>Após esse comando, iremos rodar os seguintes comandos no terminal do projeto:
>- **cd ..**
>- **sudo chmod 777 -R {nome_da_pasta}**

>Com o container criado e em execução, iremos seguir o seguinte passo a passo:
>- Iremos acessar a bash do container com o comando: "**docker exec -it nginx_app /bin/sh**"
>- Iremos rodar o comando: "**php artisan key:generate**"
>- Iremos rodar as migrations do projeto com o comando: "**php artisan migrate**"

Agora basta acessar a URL "localhost:8080" no seu navegador/postman/insomnia e acessar as rotas.

## Inicialização do projeto sem DOCKER

>Caso opte por não seguir pela configuração de ambiente com o Docker, aqui está descrito um passo a passo para inicializar o projeto.

>- De inicio, com a instalação do projeto, iremos rodar um comando para instalação de todas as dependencias do projeto, iremos utilizar o comando: "**composer install**" dentro da pasta root do projeto.
>- Logo em seguida iremos gerar uma chave que o laravel solicita para inicialização do projeto, com o comando no terminal: "**php artisan key:generate**"
>- Logo em seguida, iremos configurar o arquivo .env, iremos rodar o comando "**cp .env.example .env**" para criação do arquivo .env e iremos modificar as variáveis que iniciam com "DB_" onde são responsaveis pela comunicação com o banco de dados.
>- Após todos esses passos, iremos iniciar o servidor com o comando: "**php artisan serve**"
>- Agora todas as requisições serão feitas na URL retornada, que por padrão é: "http://127.0.0.1:8000"
>- Agora iremos rodar as migrations utilizando o comando: "**php artisan migrate**"

## Guia de utilização das rotas

Por padrão iria utilizar o swagger, porém não tive tempo o suficiente para implementação do mesmo, então segue um guia com todas as rotas e seus métodos.

>### Rotas dos movimentos
> **POST** /movement - Essa rota é resposável pela criação de um novo movimento.
>> Body Example: { "name": "Crucifixo Inclinado com Halter" }
> 
> **PUT** /movement/atualizar/{id_movement} - Essa rota é responsável pela atualização do movimento já existente.
>> Body Example: { "name": "Crucifixo Declinado com Halter" }
>
> **DELETE** /movement/deletar/{id_movement} - Essa rota é responsável por deletar o movimento já existente.
>> No Body.
> 
> **GET** /movement/{id_moviment} - Essa rota é responsável por pegar apenas um movimento através de seu ID.
>> No Body.
> 
> **GET** /movement/todos - Essa rota é responsável por retornar todos os movimentos já registrados.
>> No Body.

>### Rotas dos usuarios
> **POST** /user - Essa rota é resposável pela criação de um novo usuario.
>> Body Example: { "name": "Renato Cariani" }
>
> **PUT** /user/atualizar/{id_movement} - Essa rota é responsável pela atualização do usuario já existente.
>> Body Example: { "name": "Julio Balestrin" }
>
> **DELETE** /user/deletar/{id_movement} - Essa rota é responsável por deletar o usuario já existente.
>> No Body.
>
> **GET** /user/{id_moviment} - Essa rota é responsável por pegar apenas um usuario através de seu ID.
>> No Body.
>
> **GET** /user/todos - Essa rota é responsável por retornar todos os usuarios já registrados.
>> No Body.

>### Rotas dos Recordes Pessoais
> **POST** /personalRecord - Essa rota é resposável pela criação de um novo record pessoal.
>> Body Example: { "user_id": 1,"movement_id": 1,"value": 10,"date": "2024-09-20 10:00:00" }
> 
> **GET** /personalRecord/ranking - Essa rota é responsável por retornar uma lista com todos os recordes e com uma tag chamada "rank" para identificar o rank do usuario nos movimentos.
>> No body
