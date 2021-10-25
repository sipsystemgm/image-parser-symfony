FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    wget \
    zlib1g-dev \
    libmcrypt-dev \
    libzip-dev 
    
RUN wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/bin --filename=composer --quiet
RUN apt-get install -y nodejs npm


RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /symfony