cp .env.example .env

composer require laravel/sail --dev

php artisan sail:install

./vendor/bin/sail up

php artisan migrate