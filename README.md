![PHP Composer](https://github.com/deveBrice/community-platform-JOB/workflows/PHP%20Composer/badge.svg)
# Initialization

1) Launch containers with  ``` docker-compose up -d ```

2) Install composer dependencies through web container :
 ``` docker-compose exec web composer install  ```
3) Execute database migrations :
 ``` docker-compose exec web php bin/console doctrine:migrations:migrate```

# Basics
## Composer

Updating composer:

``` docker-compose exec web composer update ```


 
