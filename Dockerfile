FROM php:8.0-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y build-essential curl zip unzip git

COPY composer.json ./
COPY composer.lock ./

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN COMPOSER_ALLOW_SUPERUSER=1
RUN composer install

COPY . .

RUN rm -f .env

RUN printf "PATH_TO_INDEX=${PATH_TO_INDEX}" >> .env
RUN printf "\nDB_HOST=${DB_HOST}" >> .env
RUN printf "\nDB_NAME=${DB_NAME}" >> .env
RUN printf "\nDB_USER=${DB_USER}" >> .env
RUN printf "\nDB_PWD=${DB_PWD}" >> .env

RUN composer dump-autoload

EXPOSE 80