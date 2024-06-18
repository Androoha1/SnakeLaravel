#!/bin/bash
docker_dir_path="$(dirname "$(realpath "$0")")"
proj_root_path="$docker_dir_path/.."
source $proj_root_path/.env

cd "$docker_dir_path"

cd prepare
docker compose up -d; docker compose down;

cd ..
docker compose up -d
docker exec -it ${APP_NAME}-php-1 composer update
docker exec -it ${APP_NAME}-php-1 php artisan migrate
