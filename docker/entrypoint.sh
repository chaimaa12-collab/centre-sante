#!/bin/sh
set -e

# mod_php: exactly one MPM. Do not use "|| true" here — a failed cleanup must not be hidden.
apache_one_mpm_prefork() {
    find /etc/apache2/mods-enabled -maxdepth 1 \( -name 'mpm_*.load' -o -name 'mpm_*.conf' \) -delete
    a2enmod mpm_prefork
}

# Railway / Render inject PORT — must match exactly (trim whitespace).
PORT=$(printf '%s' "${PORT:-8080}")
case "$PORT" in
    ''|*[!0-9]*)
        echo "ERROR: PORT must be a number, got: $PORT" >&2
        exit 1
        ;;
esac

# Railway sets DATABASE_URL for Postgres; Laravel reads DB_URL + DB_CONNECTION. Without this, default stays sqlite and only root (migrate) can write the file — www-data gets "readonly database" on sessions.
case "${DATABASE_URL:-}" in
    postgres:*|postgresql:*|*postgres://*|*postgresql://*)
        export DB_URL="${DB_URL:-$DATABASE_URL}"
        export DB_CONNECTION="${DB_CONNECTION:-pgsql}"
        ;;
esac

# Railway requires binding 0.0.0.0 (not only implicit "Listen N"). Plain "Listen N" can miss IPv6-only paths.
{
    printf 'Listen 0.0.0.0:%s\n' "$PORT"
    printf 'Listen [::]:%s\n' "$PORT"
} > /etc/apache2/ports.conf

# Match VirtualHost to PORT every boot (not only :80 — restarts / image drift would leave *:8080 while PORT changes).
sed -i -E "s/<VirtualHost \\*:[0-9]+>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Railway public domains often keep target port 9000 (PHP-FPM) while $PORT is 8080 — healthcheck uses 8080 (/up 200) but GET / hits 9000 and 502s. Mirror the same vhost on 9000 when needed.
if [ "$PORT" != "9000" ]; then
    printf 'Listen 0.0.0.0:9000\nListen [::]:9000\n' >> /etc/apache2/ports.conf
    cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/railway-fallback-9000.conf
    sed -i -E 's/<VirtualHost \*:[0-9]+>/<VirtualHost *:9000>/' /etc/apache2/sites-available/railway-fallback-9000.conf
    a2ensite railway-fallback-9000 >/dev/null
fi

mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache
mkdir -p /var/www/html/storage/logs
touch /var/www/html/database/database.sqlite 2>/dev/null || true
chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache 2>/dev/null || true

cd /var/www/html

if [ -f artisan ]; then
    php artisan migrate --force --no-interaction || echo "WARNING: migrate failed — check DATABASE_URL" >&2
    php artisan storage:link --force --no-interaction 2>/dev/null || true
    php artisan route:clear --no-interaction 2>/dev/null || true
    php artisan config:cache --no-interaction 2>/dev/null || true
    php artisan view:cache --no-interaction 2>/dev/null || true
fi

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache 2>/dev/null || true
chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache 2>/dev/null || true

# SQLite is used if DB_* is not set: migrate runs as root, HTTP as www-data — must own database/ for WAL/journal + session writes.
chown -R www-data:www-data /var/www/html/database 2>/dev/null || true
chmod -R ug+rwX /var/www/html/database 2>/dev/null || true

apache_one_mpm_prefork

apache2ctl configtest 2>&1

if [ "$PORT" != "9000" ]; then
    echo "apache listening on 0.0.0.0:${PORT} and :9000 (fallback if public Networking target port is still 9000)" >&2
else
    echo "apache listening on 0.0.0.0:${PORT}" >&2
fi
exec apache2-foreground
