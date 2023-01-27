# Teste Backend

- rodar `docker-compose up -d` na pasta raiz do projeto
- usar o comando `docker-compose exec web composer install` para instalação dos pacotes
- usar o comando `docker-compose exec web php artisan key:generate` para o APP_KEY
- usar o comando `docker-compose exec web php artisan migrate:fresh --seed` para criação do banco de dados e sua população. Para cada usuário foi 20 contatos, podendendo usar o email `teste@teste.com` e `teste2@teste.com` ambos com a senha `teste`
- A parte 1 do teste encontra-se na pasta `app/Actions` no `BalancedSupports.php`
