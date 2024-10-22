run:
	docker-compose up -d
down:
	 docker-compose down
build:
	 docker-compose up --build -d
test:
	docker exec app vendor/bin/phpunit --verbose --colors=always
assets-install:
	docker exec node yarn install
assets-server:
	docker exec node yarn run dev
