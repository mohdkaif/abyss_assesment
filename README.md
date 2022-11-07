# Abyss Task Assesment




## About Task 

Using PHP and MySQL (PHP framework) create the following models
and relationships.
1. Show Post List (with pagination and offset limit 10 per page)
2. Create Post
3. Single Post
4. Delete Old Post (after 30 days cron job)



## Setup Project
### Dependencies software and installation


- Mysql Server

- PHP 8.1 installation with required all extension related to php

- Composer 
- Laravel 9

```
git clone https://github.com/mohdkaif/abyss_assesment.git
```
- go to directory
```
cd project_dir
```
- Run Composer Install
```
composer install && composer dump-autoload
```
- create new .env file and copy data from .env.example and paste in new .env file (if not exist .env)

```
cp .env.example .env
```

- For Generate Key

```
php artisan key:generate
```
- change .env file database configuration

- Permission to directories
```
chgrp -R www-data /var/www/project_dir_name
chown -R www-data:www-data /var/www/project_dir_name
chmod -R 775 /var/www/project_dir_name/storage
chown -R www-data.www-data /var/www/project_dir_name/storage
```
- For creating Tables
```
php artisan migrate 
```
- For Fake Data Entries
```
php artisan db:seed 
```
- For Run Server
```
php artisan serve

```
```
http://localhost:8000/
```

-Api End Point

1. Show Post List (page and limit) (GET METHOD)

```
http://localhost:8000/api/post?page=1&limit=10
```

2. Show Single Post (GET METHOD)

```
http://localhost:8000/api/post/1
```

3. Create Post(POST METHOD)

```
http://localhost:8000/api/post
```
4. Delete Old POST more than 30 days (using command) or set cron Job on server

```
php artisan post:truncate
```
```
* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
```
