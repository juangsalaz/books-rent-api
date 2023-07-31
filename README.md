# Books rent RESTful API
This API developed using Laravel, implemented Sanctum to generating token for authentication and also running in the docker environment

## This is online docummeentation
you can try this API online using this docummentation
https://documenter.getpostman.com/view/3460037/2s9XxtxvEf

## Installation
To can running in your local, go to the root of this project, then you need to run
```
docker build .
```
After finish, continue with running the docker compose
```
docker-compose up -d
```
After the docker running, go to the container bash with running
```
docker exec -it <container-id> bash
```
Then running install the composer and running the migration
```
composer install
```
```
php artisan migrate
```

## Images

<img width="1440" alt="Screen Shot 2023-07-31 at 10 10 53" src="https://github.com/juangsalaz/books-rent-api/assets/7124362/32241657-1518-4565-a1da-05cc79db3933">
