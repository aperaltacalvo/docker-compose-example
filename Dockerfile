FROM php:7.1-apache
COPY /src/docker-php/ /var/www/html/docker-php/
RUN docker-php-ext-install mysqli
EXPOSE 80