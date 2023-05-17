# Installation

## Table of Contents

- [Installation](#installation)
  - [Table of Contents](#table-of-contents)
  - [Laradock](#laradock)
  - [Laradock SSL for windows](#laradock-ssl-for-windows)
  - [PHP Version Change](#php-version-change)

## Laradock

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
docker-compose up -d apache2 mysql workspace
```

의존성 패키지 설치하기

```shell
docker-compose exec --user=laradock workspace bash
```

```shell
cd application && composer install
```

```shell
docker-compose up -d --build apache2
```

브라우저 접속하기

- URL: <http://app.test/>

## Laradock SSL for windows

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
    "devServer": {
        "https": {
            "key": "./app.test-key.pem",
            "cert": "./app.test.pem"
        }
    }
}
```

브라우저 접속하기

- URL: <https://app.test/>

## PHP Version Change

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
docker-compose up -d apache2 mysql workspace
```

```php
phpinfo();
```
