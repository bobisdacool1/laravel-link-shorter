FROM php:8.2-fpm

WORKDIR /var/www/laravel-link-shorter
ADD docker/php/conf.d /usr/local/etc/php/conf.d

RUN apt-get update \
&& pecl install xdebug \
&& docker-php-ext-enable xdebug \
&& apt-get install -y libpq-dev \
&& docker-php-ext-install pdo pdo_pgsql pgsql
