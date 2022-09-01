FROM php:8.0.5-fpm-alpine

# Install Packages
RUN apk add --no-cach

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
