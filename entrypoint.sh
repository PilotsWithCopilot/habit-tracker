#!/bin/bash

set -e

APP_ENV=${APP_ENV:-production]}
BASE_PATH=${BASE_PATH:-/var/www/html}
STORAGE_FOLDER=${STORAGE_FOLDER:-${BASE_PATH}/storage}

for FOLDER in "${STORAGE_FOLDER}/app/public" \
          "${STORAGE_FOLDER}/framework/cache" \
          "${STORAGE_FOLDER}/framework/cache/data" \
          "${STORAGE_FOLDER}/framework/testing" \
          "${STORAGE_FOLDER}/framework/sessions" \
          "${STORAGE_FOLDER}/framework/views" \
          "${STORAGE_FOLDER}/logs" \
          "${STORAGE_FOLDER}/api-docs"
do
    mkdir -p ${FOLDER}
done

if [ "${APP_ENV}" = "local" ]; then
  CURRENT_WWW_DATA_UID=$(id -u www-data)
  CURRENT_WWW_DATA_GID=$(id -g www-data)

  if [ "${CURRENT_WWW_DATA_UID}" != "${UID}" ]; then
    usermod -u "${UID}" www-data
  fi

  if [ "${CURRENT_WWW_DATA_GID}" != "${GID}" ]; then
    groupmod -g "${GID}" www-data
  fi
fi

npm install --ignore-scripts

npm run build

composer install -n --no-scripts

php artisan migrate --force
php artisan db:seed --force

php artisan storage:link

# Change owner in storage
chown -R www-data:www-data ${STORAGE_FOLDER}

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
