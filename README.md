# A simple CRUD application for product

This is an exemple and the result of a tutorial.

## Prerequisites

The following prerequisites must be filled to run this service:

- [Docker](https://docs.docker.com/get-docker/) must be installed.
- [Docker Compose](https://docs.docker.com/compose/install/) must be installed (it should be installed by default with Docker in most cases).
- [Visual Studio Code](https://code.visualstudio.com/download) must be installed.
- [Dev containers](https://code.visualstudio.com/docs/remote/containers) must be installed in Visual Studio Code.


## Start the application for local development

Open the project in Visual Studio Code, and open it in a devcontainer. In a terminal, run the following command:

```bash
docker-compose up --detach

php -S localhost:8080
```

The application should start and be accessible at <http://localhost:8080>.