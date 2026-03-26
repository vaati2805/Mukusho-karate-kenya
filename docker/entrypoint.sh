#!/bin/sh
set -e

# Create storage link (public/storage -> storage/app/public)
php artisan storage:link --force 2>/dev/null || true

# Cache config & routes for performance
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Wait for the database to be ready
echo "Waiting for database..."
sleep 15

# Run database migrations
php artisan migrate --force

# Seed default content if needed
php artisan db:seed --class=SiteContentSeeder --force 2>/dev/null || true

# Fix permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

echo "App ready!"
exec "$@"
