<h1 align="center">WordPress development with Composer and Docker</h1>

## Usage

Copy your theme over to `wp-content/themes/` and then run:

```shell
$ docker-compose start
$ docker-compose exec web composer install
```

To check the ports assigned to you, run:

```shell
$ docker ps
```
