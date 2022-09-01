FROM php:8.0.5-fpm-alpine

# Install Packages
RUN apk add --no-cache \
    bash \
    supervisor \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev

# Install php extensions
RUN docker-php-ext-install gd
RUN docker-php-ext-install pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
