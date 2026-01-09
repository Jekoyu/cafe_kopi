#!/bin/sh
set -e

# Create log directory if not exists
mkdir -p /var/log/supervisor

# Fix permissions FIRST before any artisan commands
echo "Fixing storage permissions..."
mkdir -p /var/www/html/storage/framework/{sessions,views,cache}
mkdir -p /var/www/html/storage/logs
mkdir -p /var/www/html/bootstrap/cache
chown -R www:www /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Generate APP_KEY if not set
if [ -z "$APP_KEY" ]; then
    echo "WARNING: APP_KEY is not set. Generating one..."
    php artisan key:generate --force
fi

# Run migrations if DB_RUN_MIGRATIONS is set
if [ "$DB_RUN_MIGRATIONS" = "true" ]; then
    echo "Running database migrations..."
    php artisan migrate --force
fi

# Cache configuration for production performance (run as www user)
echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Fix permissions again after caching
chown -R www:www /var/www/html/storage /var/www/html/bootstrap/cache

echo "Starting application..."
exec "$@"
