x:
	docker compose exec php bash
init_test_db:
	docker compose exec
build:
	docker compose build
run:
	docker compose up -d
check:
	composer phpcs &
	composer phpstan &
	composer psalm &
	composer test
deps:
	docker compose exec php composer install