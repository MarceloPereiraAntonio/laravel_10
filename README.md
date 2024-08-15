# Curso Laravel 10.x
## Desafio do curso:
- Criar um forum.
- Criar uma API com autentificação do nosso forum.
- Centralizar a regra de negocio sem duplicar codigo.
- Todos os usuarios podem ver todas as perguntas do forum.
- Todos usuario podem responder as duvidas do forum.
- Somente o usuario que criou a sua propria duvida pode deletar o registro.
- O usuario só pode deletar suas próprias respostas.
  
# Patterns usados:
- Service
- DTO
- Repository
- Observer
   
## Passo a passo para rodar o projeto
Clone o projeto
```sh
git clone https://github.com/MarceloPereiraAntonio/laravel_10 laravel-10
```
```sh
cd laravel-10/
```

Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="Laravel 10"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```


Acesse o projeto
[http://localhost:8989](http://localhost:8989)
