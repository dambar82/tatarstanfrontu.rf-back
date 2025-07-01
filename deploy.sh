#!/bin/bash

# Pull the latest changes from the repository
git pull origin main

# Install/update composer dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader

# Run database migrations
sail artisan migrate --force

# Clear and optimize the cache
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan cache:clear
php artisan view:cache

# Set correct permissions (optional but recommended)
chown -R www-data:www-data /var/www/html/tatarstanfrontu.rf-back
chmod -R 775 /var/www/html/tatarstanfrontu.rf-back/storage
chmod -R 775 /var/www/html/tatarstanfrontu.rf-back/cache
