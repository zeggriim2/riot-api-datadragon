FROM php:8.2.17-fpm-bullseye

RUN echo 'root:Docker!' | chpasswd

# Create a non-root user with the provided UID and GID
#ARG USER_ID
#ARG GROUP_ID
#
#RUN addgroup --gid $GROUP_ID myusergroup \
#    && adduser --disabled-password --gecos '' --uid $USER_ID --gid $GROUP_ID myuser
RUN groupadd dev -g 1000
RUN useradd dev -g dev -d /home/dev -m

# Install zip and unzip
RUN apt-get update && \
    apt-get install -y \
        zip \
        vim \
        unzip

RUN pecl install xdebug && docker-php-ext-enable xdebug

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer Symfony CLI
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt install -y symfony-cli

RUN echo xdebug.mode=coverage >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Set up working directory
WORKDIR /var/www/html

# Copy the application code
COPY ./src /var/www/html

# Expose port 9000 for Xdebug
EXPOSE 9000

# Switch to the non-root user
USER dev