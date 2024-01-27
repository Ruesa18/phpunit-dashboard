.PHONY: help

help:
	@LC_ALL=C $(MAKE) -pRrq -f $(firstword $(MAKEFILE_LIST)) : 2>/dev/null | awk -v RS= -F: '/(^|\n)# Files(\n|$$)/,/(^|\n)# Finished Make data base/ {if ($$1 !~ "^[#.]") {print $$1}}' | sort | grep -E -v -e '^[^[:alnum:]]' -e '^$@$$'

install:
	composer install
	make db
	yarn install
	make encore

db:
	bin/console doctrine:database:create --if-not-exists -n
	bin/console doctrine:schema:drop --full-database --force
	bin/console doctrine:migrations:migrate -n
	bin/console doctrine:fixtures:load -n --append
	bin/console araise:search:populate

db_test:
	bin/console doctrine:database:create --if-not-exists -n --env=test
	bin/console doctrine:schema:drop --full-database --force --env=test
	bin/console doctrine:migrations:sync-metadata-storage --env=test
	bin/console doctrine:migrations:version --add araise\\SearchBundle\\Migrations\\Version20220602150539 --no-interaction --env=test
	bin/console doctrine:migrations:version --add araise\\TableBundle\\Migrations\\Version20220622145409 --no-interaction --env=test
	bin/console doctrine:migrations:migrate -n --env=test
	bin/console doctrine:fixtures:load -n --append --env=test
	bin/console araise:search:populate --env=test

encore:
	yarn encore dev

test:
	make db_test
	make phpunit

phpunit:
	bin/phpunit --log-junit var/phpunit_output/report.xml

