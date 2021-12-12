## TestApp

Required:
- PHP 7.4
- Mysql

#You need
- create DataBase 'test_briz' in MySql
- sudo apt-get install php7.4-gd

## For Localhost

go to folder afore project and set permissions:
- sudo chgrp -R www-data test_app.loc/
- sudo chmod -R 775 test_app.loc/storage/
- sudo chmod -R 777 test_app.loc/storage/logs

1) in project create .env and fill it from .env.example
2) copy .env.example to .env and set properties for your db
in .env Fill next fields with your local data:
```
   * DB_DATABASE=test_briz
   * DB_USERNAME=***
   * DB_PASSWORD=***
```
3) run next commands:
```
- composer install
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
```


