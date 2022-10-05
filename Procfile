release: php artisan migrate:fresh --force
web: vendor/bin/heroku-php-apache2 public/
worker: php artisan queue:work