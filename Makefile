install:
	composer install

brain-games:
	./bin/brain-games

validate:
	composer validate

lint:install
	composer run-script phpcs -- --standard=PSR12 src bin