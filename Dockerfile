FROM php:8.0.11-fpm-alpine3.14
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql