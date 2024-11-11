#!/bin/sh

# Install Composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"

# Create Laravel project if it doesn't exist
if [ ! -d "/var/www/html" ]; then
    mkdir -p /var/www/html
    cd /var/www/html
    composer create-project --prefer-dist laravel/laravel .
fi

# Run php-fpm
php-fpm
