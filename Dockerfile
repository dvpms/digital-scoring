FROM php:7.4-apache

RUN rm -f /usr/lib/apache2/modules/mod_mpm_event.so \
        /usr/lib/apache2/modules/mod_mpm_worker.so \
    && a2enmod mpm_prefork rewrite

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
