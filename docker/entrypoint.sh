#! /bin/sh


cd /var/www/

composer install

php artisan migrate
php view:clear
php route:clear
php config:clear
php cache:clear

npm run build

chmod -R 777 /var/www/*
chown -R www-data:www-data /var/www*


