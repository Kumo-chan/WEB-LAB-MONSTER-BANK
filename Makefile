.PHONY: start generate-monsters install

start: start-docker start-server
start-server:
	@echo "View website here: localhost:8080"
	php -S localhost:8080
start-docker: 
	docker compose up -d
generate-monsters:
	@echo "Generating data"
	@curl --location 'http://localhost:8080/www/create.php' \
		--form 'name="Rathalos"' \
		--form 'description="Winged Wyvern, coming from Monster Hunter Series. Nicknamed King of the Sky"' \
		--form 'strength="3"'
	@curl --location 'http://localhost:8080/www/create.php' \
		--form 'name="Rathian"' \
		--form 'description="Winged Wyvern, coming from Monster Hunter Series. Nicknamed Queen of the Earth"' \
		--form 'strength="2"'
	@curl --location 'http://localhost:8080/www/create.php' \
		--form 'name="Jormugand"' \
		--form 'description="Mythical Monster from North Mythology, will devour the world during Ragnarock"' \
		--form 'strength="9"'
install: start-docker start-server