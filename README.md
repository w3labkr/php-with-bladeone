# php-ninja

php starter project skeleton

## Table of Contents

- [php-ninja](#php-ninja)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
    - [Laradock](#laradock)
    - [Recommended Package](#recommended-package)
  - [Useful Commands](#useful-commands)
    - [COMPOSER](#composer)
    - [DOCKER](#docker)
  - [License](#license)

## Installation

### Laradock

```shell
git clone https://github.com/laradock/laradock.git
```

```shell
cd laradock
```

라라독 설정하기

```shell
cp -a ../laradock-example/. ../laradock/
```

호스트 파일에 도메인 추가하기 (윈도우)

```shell
$ vi /c/Windows/System32/drivers/etc/hosts
#
127.0.0.1  localhost
127.0.0.1  app.test
...
::1 localhost
```

라라독 실행하기

```shell
docker-compose up -d apache2 mysql phpmyadmin redis workspace
```

의존성 패키지 설치하기

```shell
docker-compose exec --user=laradock workspace bash
```

```shell
cd app.test && composer install
```

브라우저 접속하기

- URL: <http://app.test/>
- phpMyAdmin: <http://app.test:8081>
  - server : mysql
  - username : root
  - password : root

### Recommended Package

- [bramus/router](https://github.com/bramus/router)  
  A lightweight and simple object oriented PHP Router

  ```shell
  composer require bramus/router ~1.6
  ```

- [catfan/medoo](https://github.com/catfan/Medoo)  
  The lightweight PHP database framework to accelerate the development.

  ```shell
  composer require catfan/medoo
  ```

- [phpmailer/phpmailer](https://github.com/PHPMailer/PHPMailer)  
  The classic email sending library for PHP

  ```shell
  composer require phpmailer/phpmailer
  ```

- [nesbot/carbon](https://github.com/briannesbitt/Carbon)  
  A simple PHP API extension for DateTime.

  ```shell
  composer require nesbot/carbon
  ```

- [fakerphp/faker](https://github.com/FakerPHP/Faker)  
  Faker is a PHP library that generates fake data for you

  ```shell
  composer require fakerphp/faker
  ```

- [guzzlehttp/guzzle](https://github.com/guzzle/guzzle)  
  Guzzle, an extensible PHP HTTP client

  ```shell
  composer require guzzlehttp/guzzle
  ```

- [symfony/dom-crawler](https://github.com/symfony/dom-crawler)  
  Eases DOM navigation for HTML and XML documents

  ```shell
  composer require symfony/dom-crawler
  ```

- [symfony/css-selector](https://github.com/symfony/css-selector)  
  Converts CSS selectors to XPath expressions

  ```shell
  composer require symfony/css-selector
  ```

- [symfony/browser-kit](https://github.com/symfony/browser-kit)  
  Simulates the behavior of a web browser, allowing you to make requests, click on links and submit forms programmatically

  ```shell
  composer require symfony/browser-kit
  ```

- [peppeocchi/php-cron-scheduler](https://github.com/peppeocchi/php-cron-scheduler)  
  PHP cron job scheduler

  ```shell
  composer require peppeocchi/php-cron-scheduler
  ```

- [monolog/monolog](https://github.com/Seldaek/monolog)  
  Sends your logs to files, sockets, inboxes, databases and various web services

  ```shell
  composer require monolog/monolog
  ```

## Useful Commands

### COMPOSER

컨테이너 접속

```shell
docker-compose exec --user=laradock workspace bash
```

```shell
cd app.test
```

COMPOSER 업데이트

```shell
composer clear-cache && composer update && composer dump-autoload
```

### DOCKER

컨테이너 빌드

```shell
docker-compose up --build
```

컨테이너 재빌드

```shell
docker-compose up --build --force-recreate
```

컨테이너 백그라운드에서 생성

```shell
docker-compose up -d <container>
```

컨테이너 삭제

```shell
docker-compose down
```

컨테이너 시작

```shell
docker-compose start
```

컨테이너 재시작

```shell
docker-compose restart
```

컨테이너 종료

```shell
docker-compose stop
```

컨테이너 확인

```shell
docker ps -a
```

컨테이너 아이디 확인

```shell
docker ps -aq
```

모든 컨테이너 삭제

```shell
docker container rm -f $(docker container ls -aq)
```

모든 도커 이미지 삭제

```shell
docker image rm -f $(docker images ls -q)
```

## License

[MIT LICENSE](LICENSE)