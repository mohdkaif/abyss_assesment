# Music Lib




## About Task Music Lib

Using PHP and MySQL (you can use any PHP framework) create the following models
and relationships.
1. Show Artist (with albums and singles)
2. Show Albums (with songs)
3. Show Song (with the artist name, and album name and year [if any])
4. List Artists (with number of albums and singles)
5. List Songs (with name matching a search parameter)


## Setup Project
### Dependencies software and installation


- Mysql Server

- PHP 8.1 installation with required all extension related to php

- Composer 
- Laravel 9

```
git clone https://github.com/mohdkaif/music-lib.git
```
- go to directory
```
cd music-lib
```
- Run Composer Install
```
composer install && composer dump-autoload
```
- create new .env file and copy data from .env.example and paste in new .env file

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

```
php artisan migrate 
```

```
php artisan db:seed 
```

```
php artisan serve

```
```
http://localhost:8000/
```

-Api End Point

1. Show Artist (with albums and singles)

```
http://localhost:8000/artist/1
```

2. Show Albums (with songs)

```
http://localhost:8000/album/1
```

3. Show Song (with the artist name, and album name and year [if any])

```
http://localhost:8000/song/1
```
4. List Artists (with number of albums and singles)

```
http://localhost:8000/artist
```
5. List Songs (with name matching a search parameter)

```
http://localhost:8000/song?parameter=qu
```
