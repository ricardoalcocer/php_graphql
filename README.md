# PHP + GraphQL Starter

## Setup PHP Project with Eloquent ORM

1. Install Illuminate via Composer

`https://packagist.org/packages/illuminate/database`

```bash
composer require illuminate/database
```

2. Add boilerplate code

```php

require('vendor/autoload.php');
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'database',
    'username' => 'root',
    'password' => 'password',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
```

3. Setup psr-4 autoloading

```php
{
    "require": {
        "illuminate/database": "^8.50"
    },
    "autoload": {
        "psr-4": {
            "App\\": "app"
        }
    }
}
```


4. Dump Autoload

`composer dump-autoload`


5. Create App/Models structure

6. Create Artist Data Model

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Artist extends Model{
    protected $table    = 'artists';
    public $timestamps  = false;
    protected $fillable = ['bio','email','stagename','fname','lname','phone','avatar','formatted_address','street_number','route','sublocality_level_1','locality','administrative_area_level_1','country','postal_code','lat','lon'];
}     
```

7. Test DB Connection

**Add code to dump data**

```php
$artist = Artist::all();
print_r(json_encode($artist->toArray()));
```

**start server**

```php -S localhost:8080```

**Output**

```json
[
  {
    "id": 182,
    "bio": "Foxfire is a rock-opera-classical fusion band from L.A.",
    "email": "foxfire@gmail.com",
    "stagename": "Foxfire",
    "fname": "Fox",
    "lname": "Fire",
    "phone": "(408) 123-4567",
    "avatar": null,
    "formatted_address": null,
    "street_number": null,
    "route": "",
    "sublocality_level_1": null,
    "locality": null,
    "administrative_area_level_1": null,
    "country": null,
    "postal_code": null,
    "lat": null,
    "lon": null,
    "timestamp": "2021-07-01 07:34:07"
  }
]
```

## Setup PHP GraphQL Server


1. Install GraphQL via Composer

```bash
composer require webonyx/graphql-php
```

