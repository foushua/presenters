# Presenters

[![Latest Version on Packagist](https://img.shields.io/packagist/v/foushua/presenters.svg?style=flat-square)](https://packagist.org/packages/foushua/presenters)
[![Quality Score](https://img.shields.io/scrutinizer/g/foushua/presenters.svg?style=flat-square)](https://scrutinizer-ci.com/g/foushua/presenters)
[![Total Downloads](https://img.shields.io/packagist/dt/foushua/presenters.svg?style=flat-square)](https://packagist.org/packages/foushua/presenters)

## Installation

You can install the package via composer:

```bash
composer require foushua/presenters
```

## Usage

The first step is to store your presenters somewhere - anywhere.

Here's an example of a presenter:

``` php
<?php 

namespace App\Presenters;

use Foushua\Presenters\Presenters;

class UserPresenter extends Presenters
{   
    /**
     * @return string
     */
    public function nameOrEmail(): string
    {
        return $this->model->name ?? $this->model->email;
    }
}
```

Next, on your model, pull in the ```Foushua\Presenters\Traits\Presentable``` trait, wich will automatically instantiate your presenter.

```php
<?php

namespace App\Presenters;

use App\Presenters\UserPresenter;
use Illuminate\Notifications\Notifiable;
use Foushua\Presenters\Traits\Presentable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Presentable, Notifiable;
    
    /**
     * @var UserPresenter
     */
    protected $presenter = UserPresenter::class;
}
```

And that's it, now in your view, you can do that:

```
<h1>{{ Auth::user()->present()->nameOrEmail() }}</h1>
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email contact@foushua.be instead of using the issue tracker.

## Credits

- [Fouyon Joshua](https://github.com/foushua)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
