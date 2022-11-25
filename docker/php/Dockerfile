FROM php:8.1-fpm

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN apt-get update && apt-get install -y \
    curl \
    jpegoptim optipng pngquant gifsicle \
    libpng-dev \
    libpq-dev \
    libzip-dev \
    unzip \
    wget \
    zip

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl && \
    docker-php-ext-configure gd && \
    docker-php-ext-install gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY php.ini /usr/local/etc/php/conf.d/local.ini

EXPOSE 9000

WORKDIR /app

CMD ["php-fpm"]
