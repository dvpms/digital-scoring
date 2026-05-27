FROM debian:bullseye-slim

# Prevent interactive prompts during package installation
ENV DEBIAN_FRONTEND=noninteractive

# Install Apache2 with ONLY mpm_prefork by pinning the package selection
# before any other MPM can be pulled in as a dependency.
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        apache2 \
        apache2-bin \
        libapache2-mod-php7.4 \
        php7.4 \
        php7.4-cli \
        php7.4-common \
        php7.4-mysql \
        php7.4-pdo \
        ca-certificates && \
    # Disable event/worker MPMs and enable only prefork
    a2dismod mpm_event mpm_worker 2>/dev/null || true && \
    a2enmod mpm_prefork rewrite && \
    # Remove competing MPM .so files so they can never be loaded
    find /usr/lib/apache2/modules/ -name 'mod_mpm_*.so' \
        ! -name 'mod_mpm_prefork.so' -delete && \
    # Clean up apt cache to keep the image small
    rm -rf /var/lib/apt/lists/*

# Copy prefork tuning config
COPY mpm_prefork_only.conf /etc/apache2/conf-enabled/mpm_prefork_only.conf

# Enable mod_rewrite and set AllowOverride All for the document root
RUN sed -i 's/AllowOverride None/AllowOverride All/g' \
        /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]
