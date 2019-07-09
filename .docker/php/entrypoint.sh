#!/bin/sh

composer --no-interaction install

/usr/local/sbin/php-fpm -F

exec "$@"
