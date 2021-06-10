# Contact Module for Adminetic Admin Panel

![Adminetic Announcemment Module](https://github.com/pratiksh404/adminetic-contact/blob/main/screenshots/banner.png)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/adminetic/contact.svg?style=flat-square)](https://packagist.org/packages/adminetic/contact)
[![Stars](https://img.shields.io/github/stars/pratiksh404/adminetic-contact)](https://github.com/pratiksh404/adminetic-contact/stargazers) [![Downloads](https://img.shields.io/packagist/dt/pratiksh/adminetic.svg?style=flat-square)](https://packagist.org/packages/pratiksh/adminetic) [![StyleCI](https://github.styleci.io/repos/373894934/shield?branch=main)](https://github.styleci.io/repos/373894934?branch=main) [![Build Status](https://scrutinizer-ci.com/g/pratiksh404/adminetic-contact/badges/build.png?b=main)](https://scrutinizer-ci.com/g/pratiksh404/adminetic-contact/build-status/main) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pratiksh404/adminetic-contact/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/pratiksh404/adminetic-contact/?branch=main) [![CodeFactor](https://www.codefactor.io/repository/github/pratiksh404/adminetic-contact/badge)](https://www.codefactor.io/repository/github/pratiksh404/adminetic-contact) [![License](https://img.shields.io/github/license/pratiksh404/adminetic-contact)](//packagist.org/packages/pratiksh/adminetic)

Contact module for Adminetic Admin Panel

For detailed documentaion visit [Adminetic Contact Module Documentation](https://app.gitbook.com/@pratikdai404/s/adminetic/addons/contact)

## Installation

You can install the package via composer:

```bash
composer require adminetic/contact
```

add contact module adapter in adminetic config file app/adminetic.php

```php
 // Adapters
    'adapters' => [
        Adminetic\Announcement\Adapter\ContactAdapter::class,
    ]
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email pratikdai404@gmail.com instead of using the issue tracker.

## Credits

- [Pratik Shrestha](https://github.com/adminetic)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).

## Sreenshots

![Adminetic Announcemment Module](https://github.com/pratiksh404/adminetic-contact/blob/main/screenshots/contact.png)
