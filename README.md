# Vidalytic Test

## Overview

This test project build based on [Zend Framework 3 Skeleton](https://github.com/zendframework/ZendSkeletonApplication/tree/release-3.0.3). It also use [Apigility 1.4](https://github.com/zfcampus/zf-apigility/tree/1.4.0) to make easy creating HTTP Request & Response.

## Installation using Docker
```
docker-compose up
docker-compose exec zf3 sh -c "cd /var/www/dev; php composer.phar install"
docker-compose exec zf3 sh -c "cd /var/www/dev; vendor/bin/doctrine-module orm:schema-tool:create"
``` 

Once installed, PHP will run using FPM with Nginx Webserver. And docker bind it to port 8080.
You can then visit the site at http://localhost:8080/

## Application
`http://localhost:8080/` contain the web page.
`http://localhost:8080/api/chat` is resource for **Chat**


### Application Testing

**Retrieving chat**
```bash
curl  -H 'Content-Type: application/json' -X GET http://localhost:8080/api/chat
```

**Send text to chat**
```bash
curl -H 'Content-Type: application/json' -X POST http://localhost:8080/api/chat \
     -d '{"message": "tralalala"}'
```
