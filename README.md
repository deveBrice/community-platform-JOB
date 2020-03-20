![PHP Composer](https://github.com/deveBrice/community-platform-JOB/workflows/PHP%20Composer/badge.svg)
[![Build Status](https://travis-ci.com/deveBrice/community-platform-JOB.svg?branch=develop)](https://travis-ci.com/deveBrice/community-platform-JOB)
# Initialization

1) Launch containers with  ``` docker-compose up -d ```

2) Install composer dependencies through web container :
 ``` docker-compose exec web composer install  ```
3) Execute database migrations :
 ``` docker-compose exec web php bin/console doctrine:migrations:migrate```
4) Copy .env.dist into .env
 ``` cp .env.dist .env```

# Basics
## Composer

Updating composer:

``` docker-compose exec web composer update ```


 

