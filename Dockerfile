# syntax=docker/dockerfile:1
# Apache + mod_php: one process listens on $PORT (Railway). No nginx/php-fpm split.

FROM node:22-bookworm AS frontend
WORKDIR /app
COPY package.json ./
RUN npm install
COPY vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm run build

FROM php:8.2-apache-bookworm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip \
    libzip-dev libonig-dev libicu-dev \
    libsqlite3-dev \
    default-libmysqlclient-dev \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
# DocumentRoot → public/; AllowOverride so Laravel public/.htaccess (rewrite) works.
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf 2>/dev/null || true \
    && sed -ri 's/AllowOverride None/AllowOverride All/g' /etc/apache2/sites-available/000-default.conf \
    && printf '%s\n' 'ServerName localhost' > /etc/apache2/conf-available/server-name.conf \
    && a2enconf server-name \
    && a2enmod rewrite

ENV MAKEFLAGS=-j1
RUN docker-php-ext-install -j1 opcache pcntl bcmath exif
RUN docker-php-ext-install -j1 mbstring zip pdo_sqlite
RUN docker-php-ext-install -j1 intl
# Last ext install wins for Apache hooks; strip every MPM symlink then enable only prefork (mod_php).
RUN docker-php-ext-install -j1 pdo_mysql pdo_pgsql \
    && find /etc/apache2/mods-enabled -maxdepth 1 \( -name 'mpm_*.load' -o -name 'mpm_*.conf' \) -delete \
    && a2enmod mpm_prefork \
    && apache2ctl configtest

RUN printf '%s\n' \
    'memory_limit = 256M' \
    'max_execution_time = 120' \
    'log_errors = On' \
    'error_log = /proc/self/fd/2' \
    'variables_order = EGPCS' \
    > /usr/local/etc/php/conf.d/railway.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .
COPY --from=frontend /app/public/build ./public/build

RUN composer install --no-dev --no-interaction --prefer-dist --no-scripts \
    && composer dump-autoload --optimize --classmap-authoritative --no-dev \
    && mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache \
    && chmod -R ug+rwx storage bootstrap/cache

COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh \
    && find /etc/apache2/mods-enabled -maxdepth 1 \( -name 'mpm_*.load' -o -name 'mpm_*.conf' \) -delete \
    && a2enmod mpm_prefork \
    && apache2ctl configtest

EXPOSE 8080

ENTRYPOINT ["/entrypoint.sh"]
