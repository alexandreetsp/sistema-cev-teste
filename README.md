
# Sistema cev Teste

Ao fazer o clone do projeto rode:

`composer install`

`php artisan key:generate`

`npm install`

e inicie o XAMPP com o Apache e MySql

Pronto:

Antes de rodar execute o migrate e dbseed:

`php artisan migrate`

e 

`php artisan db:seed`

no banco será criado dois users um administrador e um user 

os acessos são os seguinte:

email: admin@example.com

senha: admin

e na visão do user

email: user@example.com

senha: user


Rode o projeto no terminal:

`php artisan serve`

no outro terminal 

 `npm run dev`

e o projeto já deve está disponivel para a avaliação


## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

`DB_CONNECTION` mysql

`DB_HOST` [HOST] 

`DB_PORT` [PORTA]

`DB_DATABASE` sistema_cev

`DB_USERNAME` root

