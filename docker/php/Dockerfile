FROM php:8.2-fpm-trixie

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libicu-dev \
    zip \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo_mysql mbstring zip intl gd \
    && docker-php-ext-enable pdo_mysql mbstring zip intl gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --2.8.12

WORKDIR /var/www/html

COPY composer.json composer.lock ./

RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN composer install --no-interaction --prefer-dist --ignore-platform-reqs --optimize-autoloader --no-scripts

COPY package*.json ./

RUN npm install

COPY . .

COPY docker/php/entrypoint.sh /docker/php/entrypoint.sh
RUN chmod +x /docker/php/entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["/docker/php/entrypoint.sh"]
CMD ["php-fpm"]