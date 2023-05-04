# Useful Commands

## Table of Contents

- [Useful Commands](#useful-commands)
  - [Table of Contents](#table-of-contents)
  - [Usage](#usage)
  - [Commands](#commands)
    - [Composer](#composer)
    - [Docker](#docker)
  - [Issue](#issue)

## Usage

```shell
docker-compose exec --user=laradock workspace bash
```

```shell
cd app.test
```

## Commands

### Composer

```shell
composer clear-cache && composer update
```

```shell
composer clear-cache && composer dump-autoload
```

```shell
composer run-script php-cs-fixer
```

### Docker

라라독 실행하기

```shell
docker-compose up -d apache2 mysql redis workspace
```

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

## Issue

An attempt was made to access a socket in a way forbidden by its access permissions.

```shell
net stop winnat
net start winnat
```