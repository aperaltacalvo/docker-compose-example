FROM php:7.1-apache
COPY /src/docker-php/ /var/www/html/docker-php/
RUN docker-php-ext-install mysqli
ARG ARG_APACHE_LISTEN_PORT=8080
ENV APACHE_LISTEN_PORT=${ARG_APACHE_LISTEN_PORT}
RUN sed -s -i -e "s/80/${APACHE_LISTEN_PORT}/" /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf
USER www-data
EXPOSE ${APACHE_LISTEN_PORT}
