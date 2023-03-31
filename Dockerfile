# FROM php:8.1.13-apache
FROM php:8.0.28-apache

# Composer
RUN apt-get update && \
    apt-get install -y git zip unzip
COPY --from=composer:2.5.5 /usr/bin/composer /usr/bin/composer

# Install dev tools in docker (netstat, ping, telnet, nano).
RUN apt update && apt install -y net-tools iputils-ping telnet nano

# Add alias
RUN echo 'alias capro=/app/vendor/bin/capro' >> ~/.bashrc

WORKDIR "/app"
