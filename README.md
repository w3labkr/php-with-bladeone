# php-ninja

This is a starter project using the php mvp pattern without a framework. As it is a starter project, it was implemented in pure php and no css or javascript was used.

The default page is shown below.

- register, welcome, withdrawal, farewell
- login, logout, remember me
- forgot password, forgot username, reset password
- overview, profile, account, security.

## Table of Contents

- [php-ninja](#php-ninja)
  - [Table of Contents](#table-of-contents)
  - [Environment](#environment)
  - [Directory Structure](#directory-structure)
  - [Installation](#installation)
  - [Recommended Packages](#recommended-packages)
  - [Useful Commands](#useful-commands)
  - [Functions](#functions)
    - [Facker](#facker)
    - [Router](#router)
    - [Session](#session)
    - [Cookie](#cookie)
    - [Dot Notation](#dot-notation)
    - [String](#string)
    - [UUID](#uuid)
    - [CSRF Token](#csrf-token)
    - [Mailer](#mailer)
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

## Functions

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
// unset($_SESSION['a']['b']['c'])
session()->del('a.b.c');
```

```php
// isset($_SESSION['a']['b']['c'])
session()->exists('a.b.c');
```

```php
// !isset($_SESSION['a']['b']['c'])
session()->noexists('a.b.c');
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
cookie()->exists('key');
```

```php
cookie()->noexists('key');
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

### Dot Notation

Dot notation access to PHP arrays

```php
// $array['a'] = 'a';
dot()->set('a', 'a');
```

```php
// $array['a'];
dot()->get('a');
```

```php
// unset($array['a']);
dot()->del('a');
```

```php
// isset($array['a']);
dot()->exists('a');
```

```php
// !isset($array['a']);
dot()->noexists('a');
```

### String

Replace string with new characters for privacy.

```php
substr_replace_offset('foobar', '*'); // ******
substr_replace_offset('foobar', '*', 1); // f*****
substr_replace_offset('foobar', '*', 0, 1); // *****r
substr_replace_offset('foobar', '*', 1, 1); // f****r
```

### UUID

Generates random tokens. The byte length can be modified as a parameter.

```php
generate_token(16);
// 5cb43bbe36e79532f776fca4b74e84ee
```

Convert randomly generated tokens to UUID4 format.

```php
uuid4();
// 011d0956-24d9-0da2-9cf4-68032a05723c
```

Convert UUID in binary format to UUID4 format.

```php
bin2uuid4(' íðs u£¼¸N B¬   ');
// 20c3adc3-b073-2075-c2a3-c2bcc2b84e20
```

### CSRF Token

By default, CSRF validation applies to all forms where the method is POST.
You can modify it in middleware `CSRF.php`.

```html
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
```

```php
function get()
{
    $csrf_token = csrf_token();

    echo $this->view('pages.page', compact('csrf_token'));
}
```

### Mailer

Usage is same as [PHPMailer](https://github.com/PHPMailer/PHPMailer) library.

```php
$mailer = mailer()->smtp();

$mailer->setFrom('from@example.com', 'Mailer');
$mailer->addAddress('to@example.net');

$mailer->isHTML(true);
$mailer->Subject = 'Here is the subject';

$mailer->Body = "This is the HTML message body <b>in bold!</b>";
$mailer->send();
```

## License

[MIT LICENSE](LICENSE)