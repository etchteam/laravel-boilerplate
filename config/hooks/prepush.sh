#!/bin/bash

php artisan migrate --database=pgsql_test
if ! type "phpunit" > /dev/null; then
    vendor/phpunit/phpunit/phpunit --stop-on-failure
else
    phpunit --stop-on-failure
fi
