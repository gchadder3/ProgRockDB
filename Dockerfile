FROM php:7.2-apache

RUN docker-php-ext-install mysqli

COPY *.php *.html /var/www/html/