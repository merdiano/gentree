FROM composer:latest
#FROM php:8.2-cli-alpine
COPY . /usr/src/gentree
WORKDIR /usr/src/gentree
RUN composer install
#CMD [ "php", "application", "start" ]
