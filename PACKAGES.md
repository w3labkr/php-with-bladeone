# Packages

## Table of Contents

- [Packages](#packages)
  - [Table of Contents](#table-of-contents)
  - [Usage](#usage)
  - [List of package](#list-of-package)
    - [Dependency](#dependency)
    - [Crawler](#crawler)
    - [Socket](#socket)
    - [MISC](#misc)

## Usage

```shell
docker-compose exec --user=laradock workspace bash
```

```shell
cd app.test
```

## List of package

### Dependency

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

- [phpmailer/phpmailer](https://github.com/PHPMailer/PHPMailer)  
  The classic email sending library for PHP

  ```shell
  composer require phpmailer/phpmailer
  ```

- [eftec/bladeone](https://github.com/EFTEC/BladeOne)  
  The standalone version Blade Template Engine without Laravel in a single php file and without dependencies

  ```shell
  composer require eftec/bladeone
  ```

- [catfan/medoo](https://github.com/catfan/Medoo)  
  The lightweight PHP database framework to accelerate the development.

  ```shell
  composer require catfan/medoo
  ```

- [guzzlehttp/guzzle](https://github.com/guzzle/guzzle)  
  Guzzle, an extensible PHP HTTP client

  ```shell
  composer require guzzlehttp/guzzle
  ```

- [monolog/monolog](https://github.com/Seldaek/monolog)  
  Sends your logs to files, sockets, inboxes, databases and various web services

  ```shell
  composer require monolog/monolog
  ```

- [fakerphp/faker](https://github.com/FakerPHP/Faker)  
  Faker is a PHP library that generates fake data for you

  ```shell
  composer require fakerphp/faker
  ```

- [peppeocchi/php-cron-scheduler](https://github.com/peppeocchi/php-cron-scheduler)  
  PHP cron job scheduler

  ```shell
  composer require peppeocchi/php-cron-scheduler
  ```

- [friendsofphp/php-cs-fixer](https://github.com/phpseclib/phpseclib)  
  A tool to automatically fix PHP Coding Standards issues

  ```shell
  composer require --dev friendsofphp/php-cs-fixer
  ```

### Crawler

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

### Socket

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

### MISC

- [adbario/php-dot-notation](https://github.com/adbario/php-dot-notation)  
  Dot notation access to PHP arrays

  ```shell
  composer require adbario/php-dot-notation
  ```

- [respect/validation](https://github.com/Respect/Validation)  
  The most awesome validation engine ever created for PHP

  ```shell
  composer require respect/validation
  ```

- [ramsey/uuid](https://github.com/ramsey/uuid)  
  A PHP library for generating universally unique identifiers (UUIDs).

  ```shell
  composer require ramsey/uuid
  ```

- [nesbot/carbon](https://github.com/briannesbitt/Carbon)  
  A simple PHP API extension for DateTime.

  ```shell
  composer require nesbot/carbon
  ```

- [mjaschen/phpgeo](https://github.com/mjaschen/phpgeo)  
  Simple Yet Powerful Geo Library for PHP

  ```shell
  composer require mjaschen/phpgeo
  ```

- [robthree/twofactorauth](https://github.com/RobThree/TwoFactorAuth)  
  PHP library for Two Factor Authentication (TFA / 2FA)

  ```shell
  composer require robthree/twofactorauth
  ```

- [phpseclib/phpseclib](https://github.com/phpseclib/phpseclib)  
  PHP Secure Communications Library

  ```shell
  composer require phpseclib/phpseclib:~3.0
  ```
