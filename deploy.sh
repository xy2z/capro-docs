#!/bin/bash
set -e

git pull
sudo docker-compose exec builder composer install
sudo docker-compose exec builder vendor/bin/capro build
