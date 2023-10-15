#!/bin/bash

./vendor/bin/sail exec php ./vendor/bin/phpmnd app routes tests config

./vendor/bin/sail exec php ./vendor/bin/phpstan analyse --memory-limit=2G

./vendor/bin/sail exec php ./vendor/bin/phpmd app,routes,tests text phpmd.xml

./vendor/bin/sail pint

./vendor/bin/sail artisan test --min=90

./vendor/bin/sail exec php ./vendor/bin/pest --type-coverage --minimum=95
