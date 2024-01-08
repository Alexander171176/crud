FROM php:8.1-fpm-alpine

# set working directory
WORKDIR /var/www

# install dependencies
RUN apk --update add wget \
    curl \
    build-base \
    libmemcached-dev \
    libmcrypt-dev \
    libxml2-dev \
    pcre-dev \
    zlib-dev \
    autoconf \
    cyrus-sasl-dev \
    libgsasl-dev \
    oniguruma-dev \
    openssl \
    openssl-dev \
    postgresql-dev

# install extensios
RUN docker-php-ext-install pdo_pgsql pcntl

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename composer

# clean up
RUN rm /var/cache/apk/*
