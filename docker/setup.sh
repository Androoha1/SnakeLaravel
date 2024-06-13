#!/bin/bash
cd "$(dirname "$(realpath "$0")")"

cd prepare
docker compose up -d; docker compose down;

cd ..
docker compose up -d
docker exec -it snakelaravel-php-1 composer install
