FROM php:7.4-apache

RUN a2dismod mpm_prefork mpm_event mpm_worker || true \
    && a2enmod mpm_prefork rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
