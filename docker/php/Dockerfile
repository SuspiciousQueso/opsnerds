FROM php:8.3-fpm-alpine

RUN apk add --no-cache \
    bash \
    curl \
    git \
    libzip-dev \
    oniguruma-dev \
    mariadb-client

RUN docker-php-ext-install \
    pdo \
    pdo_mysql

WORKDIR /var/www/html
