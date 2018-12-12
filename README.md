<h1 align="center">WordPress development with Composer and Docker</h1>

## About

- Use docker-compose to orchestrate your services
- Use composer to manage PHP extensions, the WordPress installation, third-party themes and plugins
- Use Git to track your own made themes and plugins

## Usage

Copy your theme and/or plugins over to `wp-content/` and then run:

```shell
$ docker-compose start
$ docker-compose exec web composer install
```

To check the ports assigned to you, run:

```shell
$ docker ps
```

To redirect missing uploads to the production site fill in the `UPLOADS_URL` in `docker-compose.yml` with the hostname of your site.
