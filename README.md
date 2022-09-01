# Github Repo API

Small application that queries GitHub's API and returns 500 repos with the topic "php" (https://developer.github.com/v3/search/#search-repositories)

## Development Setup

How to run the app on your local:

1. build and run using docker-compose

    ```
    docker-compose up -d --build
    ```

1. set up your GITHUB_TOKEN on env
    ```
    GITHUB_TOKEN=
    ```
1. copy and configure config file
    ```
    docker-compose exec app cp .env.example .env
    ```
1. install dependencies
    ```
    docker-compose exec app composer install
    ```
1. API Documentation should be accessible via [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)
