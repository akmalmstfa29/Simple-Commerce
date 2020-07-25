# Simple Commerce

This project is a Simple Cart example made with Laravel 6.*

## Server Requirements

* PHP >= 7.2.0
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

## Installing

Follow these steps to set up the project.

```
$ git clone git@github.com:akmalmstfa29/Simple-Commerce.git
$ cd Simple-Commerce
$ composer install
$ chmod -R 777 storage bootstrap/cache (optional)
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate:fresh --seed
```

## Running the tests

Follow these steps to test the project in your local server.

```
$ php artisan serve
```

This command will start a development server at [http://localhost:8000](http://localhost:8000)
