#!/bin/sh
set -e

doas -u nginx sh -c "php file-watcher/start.php /var/www/var/phpunit_output/report.xml" || true
