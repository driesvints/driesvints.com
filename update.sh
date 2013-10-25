#!/bin/bash

chmod -R 777 app/storage

# update the composer binary
if [ `hostname -s` == "quantal64" ]; then
    sudo composer self-update
fi

# have to run this before any laravel code is run
composer dump-autoload

# delete compiled classes file
if [ ! -n bootstrap/compiled.php ]; then
    rm bootstrap/compiled.php
fi

# bring up the maintenance site
if [ `hostname -s` != "quantal64" ]; then
    php artisan down
fi

# install composer packages
if [ `hostname -s` != "quantal64" ]; then
    composer install --no-scripts --no-dev
else
    composer install --no-scripts --dev
fi

# migrate and seed both databases
if [ `hostname -s` != "quantal64" ]; then
    php artisan migrate --env=production
    php artisan db:seed --env=production
else
    php artisan migrate --env=local
    php artisan db:seed --env=local
fi

# create laravel optimized autoloader
php artisan dump-autoload

# bring the site back up
if [ `hostname -s` != "quantal64" ]; then
    php artisan up
fi

exit 0