FROM php:8.3-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    bash \
    curl \
    git \
    libzip-dev \
    icu-dev \
    oniguruma-dev \
    mariadb-client \
    unzip

# Install PHP extensions
RUN docker-php-ext-configure intl \
    && docker-php-ext-install pdo_mysql zip intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Make resume storage
RUN mkdir -p /var/www/html/storage/resumes \
    && chown -R www-data:www-data /var/www/html/storage