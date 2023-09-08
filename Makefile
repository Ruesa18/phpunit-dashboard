help:
	echo "===HELP==="

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

phpunit:
	make db_test
	bin/phpunit

