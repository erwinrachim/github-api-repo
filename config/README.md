<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About SpaceSage

SpaceSage is a ...

---

## Development Guide

### Branches

-   `master`: This branch stores the official release history.
-   `develop`: This branch serves as an integration branch for features.
-   `staging`: This branch for testing purposes.
-   `feature/feature-name`: feature branches use `develop` as their parent branch. When a feature is complete, it gets merged back into `develop`. Features should never interact directly with `master`.
-   `hotfix/hotfix-name`: Maintenance or "hotfix" branches are used to quickly patch production releases. This is the only branch that should fork directly off of `master`. As soon as the fix is complete, it should be merged into both `master` and `develop`, and `master` should be tagged with an updated version number.

### Creating a feature branch

Without the _git-flow_ extensions:

```
git checkout develop
git checkout -b feature/feature-name
```

When using the _git-flow_ extension:

```
git flow feature start feature-name
```

### Finishing a feature branch

When you’re done with the development work on the feature, the next step is to make _merge request_ the feature branch into `develop`.

### Creating a hotfix branch

Without the _git-flow_ extensions:

```
git checkout master
git checkout -b hotfix/hotfix-name
```

When using the _git-flow_ extension:

```
git flow hotfix start hotfix-name
```

### Finishing a hotfix branch

When you’re done with the development work on the hotfix, the next step is to make _merge request_ the hotfix branch into `master`.

---

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
1. database migration
    ```
    docker-compose exec app php artisan migrate:fresh --seed
    ```
1. create symlink to public folder
    ```
    docker-compose exec app php artisan storage:link
    ```
1. API Documentation should be accessible via [http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)
1. Database admin should be accessible via [http://localhost:8000/phpmyadmin](http://localhost:8000/phpmyadmin/)

### Code Linting

```
docker-compose exec app vendor/bin/phpcs --colors --report-full --report-summary
```

### Unit Tests

```
docker-compose exec app vendor/bin/phpunit
```

### Check Dependency Security

```
docker-compose exec app vendor/bin/local-php-security-checker-installer && vendor/bin/local-php-security-checker
```

### Development Tips

if you need to run terminal in app's docker container you can run command below

```
docker-compose exec app /bin/bash
```
