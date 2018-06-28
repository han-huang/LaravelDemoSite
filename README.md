## LaravelDemoSite
### Usage

- Install Through Composer
```
composer install
```
- copy to .env file
```
cp .env.example .env
```
- generate key
```
php artisan key:generate
```
- create database :
```
mysql> CREATE DATABASE yourdatabase CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
- patching file .env
```
./patchenv.sh
```
- modify .env to fit your environment
> **Note:** Please modify and check DB_DATABASE, MAIL setting, and Google keys in .env file. 
> Please go to the following url and get your site key and secret key for Google recaptcha. 
> https://www.google.com/recaptcha/admin#list

> **Note:** If you do not want use Google recaptcha, you can clone branch "temp" (use "mews/captcha").
- configuration caching
```
php artisan config:cache
```
- To install Voyager with dummy run
```
php artisan voyager:install --with-dummy
```
- run the NewDatabaseSeeder class
```
php artisan db:seed --class=NewDatabaseSeeder
```
- patching file routes/web.php
```
./patch.sh
```
- Running The Queue Worker (for OrderEmail)
```
artisan queue:work database --timeout=80 --tries=3
```
- URL
  - http://yourdomain
  - http://yourdomain/admin/
- Demo Video
  - https://youtu.be/qd-ISvoiPQo
- Account and Password of Front-Stage
  - database/seeds/ClientsTableSeeder.php
- Account and Password of Backstage
  - database/seeds/UsersTableSeeder.php
- Demo Video
  - https://youtu.be/lsG_nbcVmgI
