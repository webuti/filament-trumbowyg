# This is my package filament-trumbowyg

[![Latest Version on Packagist](https://img.shields.io/packagist/v/webuti/filament-trumbowyg.svg?style=flat-square)](https://packagist.org/packages/webuti/filament-trumbowyg)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/webuti/filament-trumbowyg/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/webuti/filament-trumbowyg/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/webuti/filament-trumbowyg/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/webuti/filament-trumbowyg/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/webuti/filament-trumbowyg.svg?style=flat-square)](https://packagist.org/packages/webuti/filament-trumbowyg)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require webuti/filament-trumbowyg
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-trumbowyg-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-trumbowyg-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-trumbowyg-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentTrumbowyg = new Webuti\FilamentTrumbowyg();
echo $filamentTrumbowyg->echoPhrase('Hello, Webuti!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [omer](https://github.com/webuti)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
