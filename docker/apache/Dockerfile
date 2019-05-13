FROM php:7.3-apache-stretch

RUN apt-get update

RUN apt-get install -y --no-install-recommends vim less git libcurl3-dev libzip-dev unzip
RUN docker-php-ext-install curl pdo_mysql mysqli zip

RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/ssl-cert-snakeoil.key -out /etc/ssl/certs/ssl-cert-snakeoil.pem -subj "/C=AT/ST=Vienna/L=Vienna/O=Security/OU=Development/CN=example.com"

RUN a2enmod rewrite
RUN a2ensite default-ssl
RUN a2enmod ssl

RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini
RUN sed -ri -e 's!;date.timezone =!date.timezone = "Europe/Berlin"!g' /usr/local/etc/php/php.ini

# install xdebug for code coverage
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart = 1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_port = 10000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_connect_back = 0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_host = docker.for.mac.localhost" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_log = /var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

EXPOSE 80
