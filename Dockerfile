FROM php:7.4-apache-bullseye

# Remove ALL competing MPM .so files at the filesystem level so Apache
# cannot accidentally load more than one MPM at runtime.
RUN find /usr/lib/apache2/modules/ -name 'mod_mpm_*.so' \
        ! -name 'mod_mpm_prefork.so' -delete

# Drop any pre-existing MPM enable symlinks and explicitly activate only
# mpm_prefork, then enable mod_rewrite.
RUN a2dismod mpm_event mpm_worker 2>/dev/null || true \
    && a2enmod mpm_prefork rewrite

# Copy custom Apache config that enforces a single MPM before any other
# module is processed.
COPY mpm_prefork_only.conf /etc/apache2/conf-enabled/mpm_prefork_only.conf

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
