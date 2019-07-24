<h1 align="center">WordPress development with Docker and Composer</h1>

## About

- Use docker-compose to orchestrate your services.
- Use composer to manage PHP extensions, the WordPress installation, themes, plugins, and translations.
- Use Git to track your own made themes and plugins.
- Pull missing uploads from your website for easier maintenance.

## Usage

```shell
$ docker-compose start
$ docker-compose exec web composer install
```

> To redirect missing uploads to the production site fill in the `REMOTE_URL` variable in `docker-compose.yml` with the URL of your website.
