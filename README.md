# A simple app for Monster bank

To start the application either :
    
    make install
    
Or you can run the following commands:
    
	docker compose up -d
	php -S localhost:8080

The website can be browsed at [localhost:8080](http:/localhost:8080)

In the make file, there is a script to generate some data:

    make generate-monsters