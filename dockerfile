FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libpq-dev \
    procps \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli zip opcache

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer    

# Set the working directory to the Laravel project folder
WORKDIR /var/www/html/StayEase

EXPOSE 9000

CMD [ "php-fpm" ]