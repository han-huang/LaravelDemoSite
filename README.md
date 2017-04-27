## LaravelDemoSite
### Usage

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
- patch files
```
./patch.sh
```
- URL
  - http://yourdomain
  - http://yourdomain/admin/
- Demo Video
  - https://youtu.be/qd-ISvoiPQo

### Command
Get data of counties, districts, and streets from postal web site and export excel file.
```
php artisan postal:street
```
- Demo Video
  - https://youtu.be/lsG_nbcVmgI
