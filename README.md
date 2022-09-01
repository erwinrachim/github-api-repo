# Github Repo API

Small application that queries GitHub's API and returns 500 repos with the topic "php" (https://developer.github.com/v3/search/#search-repositories)

## Development Setup

How to run the app on your local:

### Using Docker (recommended)

Before you run this app using docker, you must have docker on your local. [see this](https://www.docker.com/get-started) for installing docker on your local machine

After you installing docker on your local, follow these commands below:

1. build and run using docker-compose

    ```
    docker-compose up -d --build
    ```

1. install dependencies
    ```
    docker-compose exec app composer install
    ```

### Using Local Development Server

1. install dependencies
    ```
    composer install
    ```
1. run local development server
    ```
    php artisan serve
    ```

## API Documentation

API Documentation should be accessible via [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)
