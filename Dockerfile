FROM php:8.2.0-apache
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && docker-php-ext-install pdo_mysql
RUN apt-get update && apt-get upgrade -y

