#! /bin/sh


cd /var/www/

composer install
npm install


php artisan migrate:fresh --seed
php view:clear
php route:clear
php config:clear
php cache:clear
# php artisan adminlte:install

npm run dev

chmod -R 777 /var/www/*
chown -R www-data:www-data /var/www*
