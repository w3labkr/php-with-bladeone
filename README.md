# php-ninja

This is a starter project using the php mvp pattern without a framework. As it is a starter project, it was implemented in pure php and no css or javascript was used.

The default page is shown below.

- register, withdrawal, login, logout, remember me, overview, profile, account, security.

## Table of Contents

- [php-ninja](#php-ninja)
  - [Table of Contents](#table-of-contents)
  - [Environment](#environment)
  - [Directory Structure](#directory-structure)
  - [Installation](#installation)
  - [Recommended Packages](#recommended-packages)
  - [Useful Commands](#useful-commands)
  - [Usage](#usage)
    - [Facker](#facker)
    - [Router](#router)
    - [Session](#session)
    - [Cookie](#cookie)
    - [String](#string)
  - [License](#license)

## Environment

- php: 8.1
- mysql: 8.0

## Directory Structure

```txt
.
└── application/
    ├── app/
    │   ├── Controllers/
    │   ├── Helpers/
    │   ├── Interfaces/
    │   ├── Middlewares/
    │   ├── Models/
    │   └── ThirdParty/
    ├── config/
    ├── data/
    │   └── sql/
    ├── database/
    │   ├── factories/
    │   └── seeders/
    ├── public/
    │   └── assets/
    │       ├── css/
    │       ├── images/
    │       └── js/
    ├── resources/
    │   ├── language/
    │   └── views/
    │       ├── includes/
    │       ├── layouts/
    │       └── pages/
    ├── routes/
    ├── schedulers/
    ├── storage/
    │   ├── app/
    │   ├── framework/
    │   │   ├── cache/
    │   │   ├── sessions/
    │   │   ├── testing/
    │   │   └── views/
    │   └── logs/
    ├── tests/
    ├── vendor/
    └── server.php
```

## Installation

You can see more details on the page below.

- [INSTALL](INSTALL.md) 

## Recommended Packages

You can see more details on the page below.

- [PACKAGES](PACKAGES.md)

## Useful Commands

You can see more details on the page below.

- [COMMANDS](COMMANDS.md)

## Usage

### Facker

Generates fake data

```php
$faker = new \App\Models\UserFaker();
$faker->createTable()->factory(10);
```

### Router

The router automatically loads files under the `routes` directory. 

- The `web.php` file does not apply.
- File names starting with an `underscore` are not applied.

### Session

Sessions support dot notation.

```php
// $_SESSION['a']['b']['c'] = 'value';
session()->set('a.b.c', 'value');
```

```php
// $_SESSION['a']['b']['c']
session()->get('a.b.c');
```

```php
// isset($_SESSION['a']['b']['c'])
session()->has('a.b.c');
```

```php
// unset($_SESSION['a']['b']['c'])
session()->del('a.b.c');
```

### Cookie

Set non-strict mode

- expires: `0`
- path: `/`
- domain: `''`
- secure: `false`
- httponly: `false`
- samesite: `null`

```php
cookie()->set('key', 'value');
```

```php
cookie()->set('key', 'value', [
    'expires' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => false,
    'httponly' => false,
    'samesite' => null,
]);
```

```php
cookie()->get('key');
```

```php
cookie()->has('key');
```

Set strict mode

- expires: `0`
- path: `/`
- domain: `$_SERVER['SERVER_NAME']`
- secure: `true`
- httponly: `true`
- samesite: `'Strict'`

```php
cookie('Strict')->set('key', 'value');
```

```php
cookie()->set('key', 'value', [
    'expires' => 0,
    'path' => '/',
    'domain' => $_SERVER['SERVER_NAME'],
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict', // None || Lax || Strict
]);
```

```php
cookie('Strict')->del('key');
```

Supports the strtotime() function when the expires value is a string time.

```php
cookie()->set('key', 'value', [
    'expires' => 'now',
    'expires' => '+1 seconds',
    'expires' => '+1 hours',
    'expires' => '+1 days',
    'expires' => '+1 week',
    'expires' => '+1 months',
    'expires' => '+1 years',
    'expires' => '+1 years +2 months +3 days +4 hours',
    'expires' => '2001-01-01 +1 months',
    'expires' => '2001-01-01 000000 +1 months',
]);
```

```php
cookie('Strict')->del('key');
```

### String

Replace string with new characters for privacy.

```php
substr_replace_offset('foobar', '*'); // ******
substr_replace_offset('foobar', '*', 1); // f*****
substr_replace_offset('foobar', '*', 0, 1); // *****r
substr_replace_offset('foobar', '*', 1, 1); // f****r
```

## License

[MIT LICENSE](LICENSE)