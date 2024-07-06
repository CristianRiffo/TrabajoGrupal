Pasos para clonar el repositorio y que funcione local

Consola en una carpeta vacia
git init
git clone <link>.git / git remote add origin <link>.git
composer install
php artisan key:generate
php artisan migrate
php artisan serve
