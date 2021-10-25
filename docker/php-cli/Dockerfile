FROM php:7.4-cli

RUN apt-get update && apt-get install -y \
    supervisor \
    libpq-dev \
    wget \
    zlib1g-dev \
    libmcrypt-dev \
    libzip-dev  \
    libmemcached-dev \
    curl
    
    
RUN pecl install redis && docker-php-ext-enable redis

RUN pecl install memcached && docker-php-ext-enable memcached

RUN docker-php-ext-install pdo pdo_mysql zip

RUN wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/bin --filename=composer --quiet
COPY ./supervisor-queue-message.conf /etc/supervisor/conf.d/supervisor-queue-message.conf

WORKDIR /symfony