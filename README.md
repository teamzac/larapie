# A SimplePie wrapper with Laravel support

[![Latest Version on Packagist](https://img.shields.io/packagist/v/teamzac/larapie.svg?style=flat-square)](https://packagist.org/packages/teamzac/larapie)
[![Build Status](https://img.shields.io/travis/teamzac/larapie/master.svg?style=flat-square)](https://travis-ci.org/teamzac/larapie)

SimplePie is a popular and feature-rich PHP library for parsing RSS/Atom feeds, but I don't particularly like the API. This package is just a lightweight wrapper around SimplePie that provides a slightly different API along with Laravel support.

## Installation

You can install the package via composer:

```bash
composer require teamzac/larapie
```

## Usage

``` php
$feed = LaraPie::feed('https://your-feed-url/here.rss')->get();
$feed->items()->each(function($item) {
  echo $item->title;
});
```

The primary data types are Feed and Item. 

### Feed

The Feed class represents the RSS feed. It has an ```items()``` method which returns an ```Illuminate\Support\Collection``` instance of the feed items (```TeamZac\LaraPie\Item```). The Feed has the following read-only properties:

* title
* type
* links (```TeamZac\LaraPie\Links```)

### Item

The Item class represents a single feed item. It has the following read-only properties:

* id - usually the URL
* title
* description
* content
* categories (```Illuminate\Support\Collection``` of strings)
* authors (```Illuminate\Support\Collection``` of ```TeamZac\LaraPie\Author```)
* dates (```Illuminate\Support\Collection``` of ```Carbon\Carbon```)
* links (```Illuminate\Support\Collection``` of strings)

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email chad@zactax.com instead of using the issue tracker.

## Credits

- [Chad Janicek](https://github.com/teamzac)
- [Laravel Package Boilerplate](https://laravelpackageboilerplate.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.