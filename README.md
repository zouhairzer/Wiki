# démarer autoloader
composer dump-autoload

## Install Symfony VarDumper (used for debugging) as a development dependency
composer require --dev symfony/var-dumper

## Start the built-in PHP web server :

php -S localhost:8000 -t public