FROM wordpress:php8.3-fpm AS php
ARG PLUGIN_NAME="cloudusk-boilerplate"
# curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp
WORKDIR /var/www/html

FROM node:lts-slim AS node
ARG PLUGIN_NAME="cloudusk-boilerplate"
WORKDIR /var/www/html/wp-content/plugins/${PLUGIN_NAME}
COPY plugins/${PLUGIN_NAME}/package.json plugins/${PLUGIN_NAME}/yarn.lock ./
RUN yarn install