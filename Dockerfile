FROM php:8.4-cli

RUN apt-get update && apt-get install -y git unzip libpq-dev

RUN docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/app
COPY . /var/www/app

RUN composer install --no-interaction

# Use entrypoint
ENTRYPOINT ["./entrypoint.sh"]