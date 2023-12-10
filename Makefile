.PHONY: start generate-monsters install

start: start-docker start-server
start-server:
	@echo "View website here: localhost:8080"
	php -S localhost:8080
start-docker: 
	docker compose up -d
generate-monsters:
	@echo "Generating data"
	sleep 3 #To avoid running without DB running
	@php ./generate-db.php
install: start-docker generate-monsters start-server