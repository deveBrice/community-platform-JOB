FROM php:7.2.14-alpine

MAINTAINER herloct <herloct@gmail.com>

ENV PHP_CS_FIXER_VERSION=2.14.0

RUN curl -L https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v$PHP_CS_FIXER_VERSION/php-cs-fixer.phar > /usr/local/bin/php-cs-fixer \
    && chmod +x /usr/local/bin/php-cs-fixer \

    && rm -rf /var/cache/apk/* /var/tmp/* /tmp/*

VOLUME ["/app"]
WORKDIR /app

ENTRYPOINT ["php-cs-fixer"]
CMD ["--version"]
