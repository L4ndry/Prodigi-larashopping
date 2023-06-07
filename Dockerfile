FROM php:8.1.20RC1-fpm-alpine3.16

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-progress --no-suggest --no-interaction
RUN cp .env.example .env
RUN php artisan key:generate
