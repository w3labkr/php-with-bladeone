# php-ninja

PHP mvc pattern without framework

## Table of Contents

- [php-ninja](#php-ninja)
  - [Table of Contents](#table-of-contents)
  - [Installation](#installation)
    - [Laradock](#laradock)
    - [Laradock SSL for windows](#laradock-ssl-for-windows)
    - [PHP Version Change](#php-version-change)
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
$ vi c://Windows/System32/drivers/etc/hosts
#
127.0.0.1  localhost
127.0.0.1  app.test
...
::1 localhost
```

라라독 실행하기

```shell
docker-compose up -d apache2 mysql redis workspace
```

의존성 패키지 설치하기

```shell
docker-compose exec --user=laradock workspace bash
```

```shell
cd app.test && composer install
```

```shell
docker-compose up -d --build apache2
```

브라우저 접속하기

- URL: <http://app.test/>

### Laradock SSL for windows

SSL 설치하기

Edit `laradock/.env`

```ini
APACHE_INSTALL_HTTP2=true
```

SSL 인증서 발급하기

```shell
choco install mkcert
```

로컬을 인증된 발급기관으로 추가하기

```shell
mkcert -install
```

SSL 인증서 발급하기

```shell
mkcert app.test
```

Edit `laradock\apache2\sites\app.test.conf`

```conf
<VirtualHost *:443>
    ...
    SSLEngine on
    SSLCertificateFile /etc/apache2/ssl/app.test.pem
    SSLCertificateKeyFile /etc/apache2/ssl/app.test-key.pem
    ...
</VirtualHost>
```

WebPack 사용시

```json
{
  devServer: {
    https: {
      key: "./app.test-key.pem",
      cert: "./app.test.pem"
    }
  }
}
```

브라우저 접속하기

- URL: <https://app.test/>

### PHP Version Change

Edit `.env` file

```ini
PHP_VERSION=
```

```shell
docker-compose build php-fpm
docker-compose build workspace
```

```shell
docker-compose down
docker-compose up -d apache2 mysql redis workspace
```

```php
phpinfo();
```

### Recommended Package

```shell
docker-compose exec --user=laradock workspace bash
```

```shell
cd app.test
```

- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)  
  Loads environment variables from `.env` to `getenv()`, `$_ENV` and `$_SERVER` automagically.

  ```shell
  composer require vlucas/phpdotenv
  ```

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

- [eftec/bladeone](https://github.com/EFTEC/BladeOne)  
  The standalone version Blade Template Engine without Laravel in a single php file and without dependencies

  ```shell
  composer require eftec/bladeone
  ```

- [mjaschen/phpgeo](https://github.com/mjaschen/phpgeo)  
  Simple Yet Powerful Geo Library for PHP

  ```shell
  composer require mjaschen/phpgeo
  ```

- [cboden/Ratchet](https://github.com/ratchetphp/Ratchet)  
  Asynchronous WebSocket server

  ```shell
  composer require cboden/ratchet
  ```

- [ratchet/pawl](https://github.com/ratchetphp/Pawl)  
  Asynchronous WebSocket client

  ```shell
  composer require ratchet/pawl
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

AUTOLOAD 업데이트

```shell
composer clear-cache && composer dump-autoload
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