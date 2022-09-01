# Github Repo API

Small application that queries GitHub's API and returns 500 repos with the topic "php" (https://developer.github.com/v3/search/#search-repositories)

## Development Setup

How to run the app on your local:

1. build and run using docker-compose
    ```
    docker-compose up -d --build
    ```
1. copy and configure config file
    ```
    docker-compose exec app cp .env.example .env
    ```
1. install dependencies
    ```
    docker-compose exec app composer install
    ```
1. generate app key
    ```
    docker-compose exec app php artisan key:generate
    ```
1. API Documentation should be accessible via [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)
