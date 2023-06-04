# for demonstration purposes with docker

FROM node:alpine3.17 AS node
WORKDIR /app
COPY . /app
RUN npm install

FROM composer:2.5.7 as laravel
WORKDIR /app
COPY --from=node /app /app
COPY .env.example .env
RUN composer install --ignore-platform-reqs
RUN composer update
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql
RUN php artisan key:generate
EXPOSE 80
ENTRYPOINT ["/app/entrypoint.sh"]