FROM php:8.2-fpm

RUN apt-get update && apt upgrade -y && apt-get install -y unzip vim
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Installation de Xdebug
RUN docker-php-ext-enable xdebug

# Configuration de Xdebug pour le code coverage de PHPUnit
RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

WORKDIR /var/www/html

CMD ["php-fpm"]