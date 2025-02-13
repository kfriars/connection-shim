# Laravel Connection Shim

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kfriars/connection-shim.svg?style=flat-square)](https://packagist.org/packages/kfriars/connection-shim)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/kfriars/connection-shim/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/kfriars/connection-shim/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/kfriars/connection-shim/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/kfriars/connection-shim/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kfriars/connection-shim.svg?style=flat-square)](https://packagist.org/packages/kfriars/connection-shim)

This package is a set of Laravel Connection implementations that allow you to persist the Schema Builder on the Connection instance.

The Laravel Framework has hard-coded the schema builder into the connections, so if you want to customize the schema builder you would need to override the connection classes.

I have started a [discussion](https://github.com/laravel/framework/discussions/54551) on the `laravel/framework` repository, to see if this behavior can be changed.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/connection-shim.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/connection-shim)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require kfriars/connection-shim
```

## Usage

After installing the package, you will not need to do anything else. All first-party database drivers will allow you to call the `setSchemaBuilder` method on them. This ensures the connection will be using a consistent schema throughout execution.

## Credits

- [Kurt Friars](https://github.com/kfriars)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
