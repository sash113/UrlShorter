FROM php:7-fpm-alpine

RUN apk add --no-cache --virtual .persistent-deps bash nano

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN curl https://getcomposer.org/installer > composer-setup.php && php composer-setup.php && mv composer.phar /usr/local/bin/composer && rm composer-setup.php

ADD .docker/php/entrypoint.sh /entrypoint.sh
RUN chmod 755 /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]