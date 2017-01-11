## Voyager & MultiAuth
### Usage

- Multi-auth - client has been created.

- Install Through Composer
```
composer install
```
- copy .env file & modify it
```
cp .env.example .env
```
- generate key
```
php artisan key:generate
```
- create database :
```
mysql> CREATE DATABASE yourdatabase CHARACTER SET utf8 COLLATE utf8_unicode_ci;
```
- To install Voyager with dummy run
```
php artisan voyager:install --with-dummy
```
- run the NewDatabaseSeeder class
```
php artisan db:seed --class=NewDatabaseSeeder
```
- URL
  - http://yourdomain
  - http://yourdomain/client/register
  - http://yourdomain/client/login
  - http://yourdomain/admin/login

