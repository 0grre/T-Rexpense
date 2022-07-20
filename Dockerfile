FROM php:8.0.11-apache

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY . /var/www/html

RUN apt-get update && apt-get install -qqy git unzip libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libaio1 wget && apt-get clean autoclean && apt-get autoremove --yes &&  rm -rf /var/lib/{apt,dpkg,cache,log}/

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add other PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Add Apache rewrite module
RUN a2enmod rewrite

RUN chown -R :www-data /var/www/html

RUN chmod -R 777 /var/www/html

RUN chmod -R 777 /var/www/html/public

RUN chmod -R 777 /var/www/html/storage

RUN chmod -R 777 /var/www/html/bootstrap/cache
