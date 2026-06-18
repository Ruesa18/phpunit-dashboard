# Base stage (used in development and production)
FROM whatwedo/symfony:v2.10 as base

# Development stage (depencencies and configuration used in development only)
FROM base as dev

RUN apk add --no-cache make mysql-client npm php$PHP_VERSION-xdebug

COPY ./docker/dev/etc /etc

# Production stage (depencencies and configuration used in production only)
FROM dev as prod

ADD . /var/www
