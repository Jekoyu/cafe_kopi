#!/bin/sh
set -e

# Create log directory if not exists
mkdir -p /var/log/supervisor

# Generate APP_KEY if not set
if [ -z "$APP_KEY" ]; then
    echo "WARNING: APP_KEY is not set. Generating one..."
    php artisan key:generate --force
fi

# Cache configuration for production performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations if DB_RUN_MIGRATIONS is set
if [ "$DB_RUN_MIGRATIONS" = "true" ]; then
    echo "Running database migrations..."
    php artisan migrate --force
fi

# Fix permissions
chown -R www:www /var/www/html/storage /var/www/html/bootstrap/cache

echo "Starting application..."
exec "$@"
