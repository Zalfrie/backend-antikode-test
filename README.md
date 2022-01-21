[![CI](https://github.com/Zalfrie/backend-antikode-test/actions/workflows/laravel.yml/badge.svg)](https://github.com/Zalfrie/backend-antikode-test/actions/workflows/laravel.yml)

## Technologies
Project is created with:
* PHP 8
* GraphQL
* Mysql 8
* Laravel 8
* Nginx

## Setup
Make sure to have all the dependencies above installed locally.

```
- pull this repo
- open in IDE
- copy .env.example to .env
- set Database connection in .env file
- run ``composer install``
- run ``php artisan key:generate``
- run ``php artisan migrate``
- run ``php artisan db:seed``
- open browser http://<<your-localhost-name>>/graphiql 
```

## Screen Shot
!![alt text](https://github.com/Zalfrie/[reponame]/blob/backend-antikode-test/Screenshot 2022-01-21 at 16-02-08 GraphiQL.png?raw=true)
