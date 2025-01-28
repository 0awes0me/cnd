#!/bin/bash

# Wait for MySQL to be ready
echo "Waiting for MySQL to be ready..."
until mysqladmin ping -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" --silent; do
  sleep 1
done

composer install --no-interaction --prefer-dist
php artisan migrate --force
php artisan optimize:clear
./vendor/bin/pest


# Start Apache
apache2-foreground
