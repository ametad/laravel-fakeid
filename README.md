# Laravel FakeID

[![Latest Version](https://img.shields.io/packagist/v/oanhnn/laravel-fakeid.svg)](https://packagist.org/packages/oanhnn/laravel-fakeid)
[![Software License](https://img.shields.io/github/license/oanhnn/laravel-fakeid.svg)](LICENSE)
[![Build Status](https://img.shields.io/travis/oanhnn/laravel-fakeid/master.svg)](https://travis-ci.org/oanhnn/laravel-fakeid)
[![Coverage Status](https://img.shields.io/coveralls/github/oanhnn/laravel-fakeid/master.svg)](https://coveralls.io/github/oanhnn/laravel-fakeid?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/oanhnn/laravel-fakeid.svg)](https://packagist.org/packages/oanhnn/laravel-fakeid)
[![Requires PHP](https://img.shields.io/travis/php-v/oanhnn/laravel-fakeid.svg)](https://travis-ci.org/oanhnn/laravel-fakeid)

Easy fake model ID on URL Laravel 5.5+ Application.

## TODO

- [x] Make repository on [Github](https://github.com)
- [x] Make repository on [Travis](https://travis.org)
- [x] Make repository on [Coveralls](https://coveralls.io)
- [x] Make repository on [Packagist](https://packagist.org)
- [x] Write logic classes
- [ ] Write test scripts
- [x] Write README & documents

## Requirements

* php >=7.1.3
* Laravel 5.5+

## Installation

Begin by pulling in the package through Composer.

```bash
$ composer require oanhnn/laravel-fakeid
```

## Usage

### Getting start

In your model class, add implement interface `ShouldFakeId` and a trait `RoutesWithFakeId`:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\FakeId\Contracts\ShouldFakeId;
use Laravel\FakeId\RoutesWithFakeId;

class MyModel extends Model implements ShouldFakeId
{
    use RoutesWithFakeId;
    
    // other logic
}
```


### Using specific driver

By default, `RoutesWithFakeId` use default driver, it is set in config file. You can override `getFakeIdDriver()` method to use specific driver:

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\FakeId\Contracts\ShouldFakeId;
use Laravel\FakeId\Drivers\DriverInterface;
use Laravel\FakeId\Facades\FakeId;
use Laravel\FakeId\RoutesWithFakeId;

class MyModel extends Model implements ShouldFakeId
{
    use RoutesWithFakeId;
    
    /**
     * @return DriverInterface
     */
    public function getFakeIdDriver() : DriverInterface
    {
         return FakeId::driver('other');
    }
}
```


### Custom driver

You can also create custom driver by add below code to `AppServiceProvider::boot()` method

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\FakeId\Facades\FakeId;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        FakeId::extend('other', function($app) {
            // create custom driver
        });

        // other logic
    }
}
``` 

## Changelog

See all change logs in [CHANGELOG](CHANGELOG.md)

## Testing

```bash
$ git clone git@github.com/oanhnn/laravel-fakeid.git /path
$ cd /path
$ composer install
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email to [Oanh Nguyen](mailto:oanhnn.bk@gmail.com) instead of 
using the issue tracker.

## Credits

- [Oanh Nguyen](https://github.com/oanhnn)
- [All Contributors](../../contributors)

## License

This project is released under the MIT License.   
Copyright © 2018 [Oanh Nguyen](https://oanhnn.github.io).
