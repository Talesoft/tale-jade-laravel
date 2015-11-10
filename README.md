# Tale Jade for Laravel

---

This library provides the ability to use [Jade](http://github.com/Talesoft/tale-jade)-templates with the Laravel Framework

---

## Usage

Download and install via composer

```bash
$ composer require "talesoft/tale-jade-laravel:*"
$ composer install
```


Add the service provider to your `config/app.php`-file (Right below the other ones)

```php
        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        [...]
        

        Tale\Jade\Bridge\Laravel\ServiceProvider::class,
        
```


You can now create `<template-name>.jade`-files inside your `resources/views` directory and use them directly.
All features work correctly.

