#!/bin/bash

# for demonstration purposes with docker

php artisan storage:link

echo "Starting server"
php artisan serve --host=0.0.0.0 --port=80