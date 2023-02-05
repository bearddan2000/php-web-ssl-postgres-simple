FROM php:7.2.11-fpm

EXPOSE 9000

WORKDIR /application

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install apt-utils libxml2-dev gnupg apt-transport-https \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git
RUN apt-get update \
    && apt-get -y --no-install-recommends install libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

# Install required extensions
RUN docker-php-ext-install pdo pdo_pgsql
