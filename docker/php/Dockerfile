FROM php:8.4-rc-fpm-alpine

RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS

RUN apk --no-cache update && apk --no-cache add \
    curl \
    git \
    bash \
    libpq-dev \
    zip \
    unzip \
    sqlite-dev \
    libzip-dev \
    linux-headers

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer