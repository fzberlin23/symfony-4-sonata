FROM php:7.2-apache

RUN apt-get update

RUN apt-get install -y --no-install-recommends vim less git libcurl3-dev zlib1g-dev unzip
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

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

EXPOSE 80
