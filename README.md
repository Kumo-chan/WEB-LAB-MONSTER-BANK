# A simple app for Monster bank

To start the application the first time
    
    make install
    
AFterwards, either run :

    make
    
Or
	
    docker compose up -d
	php -S localhost:8080

Note that docker compose is running in the background, so you might want to stop it with

    docker compose down

The website can be browsed at [localhost:8080](http:/localhost:8080)

In the make file, there is a script to generate some data:

    make generate-monsters

This is automatically ran when running install
