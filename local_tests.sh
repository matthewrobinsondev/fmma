#!/bin/bash

./vendor/bin/phpmnd app routes tests config

./vendor/bin/phpstan analyse --memory-limit=2G

./vendor/bin/phpmd app,routes,tests text phpmd.xml

./vendor/bin/sail pint

./vendor/bin/sail artisan test
