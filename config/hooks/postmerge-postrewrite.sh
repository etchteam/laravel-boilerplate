#!/bin/bash

yarn install
composer install
php artisan migrate --database=pgsql_remote
