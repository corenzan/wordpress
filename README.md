# WordPress + Docker + Composer

## About

- Docker and Traefik give speed and isolation during development.
- Composer allows for easy management of PHP version, extensions and packages.
- Git to track your all configuration files, and own themes and plugins.
- Access denied outside public directory.
- Load missing uploads directly from your website for easier maintenance.

## Usage

Clone this repository, edit values in `docker-compose.yml` and `composer.json`.

```shell
$ docker-compose start
$ docker-compose exec web composer install
```

## Legal

The MIT License © 2019 Arthur Corenzan
