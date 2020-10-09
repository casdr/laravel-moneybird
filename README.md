# laravel-moneybird

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Total Downloads][ico-downloads]][link-downloads]

This Laravel package is a wrapper for [picqer/moneybird-php-client](https://github.com/picqer/moneybird-php-client).

## Install

Via Composer

``` bash
$ composer require casdr/laravel-moneybird
```

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

### Laravel without auto-discovery:

If you don't use auto-discovery, add the ServiceProvider and the Facade to your `config/app.php`:

```php
'providers' => [
  ...
  Casdr\Moneybird\MoneybirdServiceProvider::class,
],
'aliases' => [
  ...
  'Moneybird' => Casdr\Moneybird\MoneybirdFacade::class,
]
```

Then run the following command to publish the config to your config/ directory.

```bash
$ php artisan vendor:publish --tag=config
```

You then need to generate an application in the Moneybird interface and set the configuration for this module.

```php
return [
    'redirect_uri' => 'urn:ietf:wg:oauth:2.0:oob',
    'client_id' => 'ij8uhui34g1409fn', // The client ID of your Moneybird application
    'client_secret' => 'hu4ht89y0rfhbsduofas', // The client secret of your Moneybird application
    'authorization_token' => '', // The authorization token for your account (https://developer.moneybird.com/authentication/#authentication) (optional)
    'access_token' => '', // The access token for your account  (optional)
    'administration_id' => '' // The administration ID you want to use (optional)
];
```

## Usage

``` php
$contact = Moneybird::contact();

$contact->company_name = 'BlaLabs';
$contact->firstname = 'Cas';
$contact->lastname = 'de Reuver';
$contact->save();
```

For more usage information, see [picqer/moneybird-php-client](https://github.com/picqer/moneybird-php-client)

## Credits

- [Cas de Reuver][link-author] <cdreuver@blalabs.com>

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[ico-version]: https://img.shields.io/packagist/v/casdr/laravel-moneybird.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/casdr/laravel-moneybird.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/casdr/laravel-moneybird
[link-downloads]: https://packagist.org/packages/casdr/laravel-moneybird/stats
[link-author]: https://github.com/casdr
