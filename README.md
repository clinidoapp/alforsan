<p align="center"><a href="https://alforsan.clinido.net/" target="_blank"><img src="https://alforsan.clinido.net/images/logo@3x.webp" width="400" alt="Laravel Logo"></a></p>

## Project Install

git clone https://github.com/clinidoapp/alforsan.git

## Run :- composer install 

## In your .env file :-
Add your Database configurations :-
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE= EX :- database_x
- DB_PASSWORD=

Add your mail configurations :-
- MAIL_MAILER=smtp
- MAIL_SCHEME=null
- MAIL_HOST=smtp.gmail.com
- MAIL_PORT=587
- MAIL_USERNAME=EX :- Mr.x
- MAIL_PASSWORD= EX :- Password
- MAIL_FROM_ADDRESS= Ex :- User0@gmail.com
- MAIL_FROM_NAME= EX :- User Name 

## Run :- php artisan migrate

## Run :- php artisan db:seed

## Run :- php artisan serve
