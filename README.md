# Create PDF Letter from Template
This repository is the coding test from Intership Campuspedia. 

## Getting Started
To start running this project locally, you must follow these steps:
First, clone there repository to the your folder.
```
> https://github.com/mluthfit/letter-pdf.git
```

Then, open the folder and **install** all packages with composer.
```
> composer update
```

Then, launch the XAMPP control panel and start `MySQL` and `Apache` service.

Then, open `http://localhost/phpmyadmin/` in your browser and create database.

Then, change `DB_DATABASE` value on `.env.example` according to your database name.

Then, change file name from `.env.example` to `.env`.

Next, migrate database with artisan.
```
> php artisan migrate:fresh
```

Last, start the server.
```
> php artisan serve
```