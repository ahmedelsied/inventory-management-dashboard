#!/usr/bin/env bash
set -euo pipefail

cd /var/www/html

PORT="${PORT:-80}"

if [[ "${PORT}" != "80" ]]; then
  sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
  sed -i "s/<VirtualHost \\*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf
fi

mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache || true

# Ensure storage symlink exists (useful for uploads)
php artisan storage:link --no-interaction || true

# If no key is provided (common in first boot), generate one.
if [[ -z "${APP_KEY:-}" ]]; then
  php artisan key:generate --force --no-interaction || true
fi

# Optional: run migrations automatically on boot (Render-friendly).
if [[ "${RUN_MIGRATIONS:-false}" == "true" ]]; then
  php artisan migrate --force --no-interaction
fi

# Cache framework files in production for better performance.
if [[ "${APP_ENV:-}" == "production" ]]; then
  php artisan config:cache --no-interaction || true
  php artisan route:cache --no-interaction || true
  php artisan view:cache --no-interaction || true
fi

exec "$@"

