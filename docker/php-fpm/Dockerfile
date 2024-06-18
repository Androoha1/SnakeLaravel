FROM php:8.2-fpm

#tools that are required by composer.
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    && docker-php-ext-install \
    pdo \
    pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /var/www/html
EXPOSE 9000

CMD ["php-fpm"]