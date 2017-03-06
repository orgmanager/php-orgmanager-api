# PHP OrgManager API Client

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/198c105f5e434fe2806b39a17d458dc3)](https://www.codacy.com/app/m1guelpiedrafita/php-orgmanager-api?utm_source=github.com&utm_medium=referral&utm_content=orgmanager/php-orgmanager-api&utm_campaign=badger)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/orgmanager/orgmanager-api.svg?style=flat-square)](https://packagist.org/packages/orgmanager/orgmanager-api)
[![Software License](https://img.shields.io/github/license/orgmanager/php-orgmanager-api.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/orgmanager/php-orgmanager-api/master.svg?style=flat-square)](https://travis-ci.org/orgmanager/php-orgmanager-api)
[![Total Downloads](https://img.shields.io/packagist/dt/orgmanager/orgmanager-api.svg?style=flat-square)](https://packagist.org/packages/orgmanager/orgmanager-api)

This package makes it easy to interact with [the OrgManager API](https://github.com/orgmanager/orgmanager#api).

## Installation

You can install the package via composer:

``` bash
composer require orgmanager/orgmanager-api
```

## Usage

You must pass a Guzzle client and the API token to the constructor of `OrgManager\ApiClient\OrgManager`.

``` php
$client = new \GuzzleHttp\Client();

$token = 'YOUR_ORGMANAGER_API_TOKEN';

$orgmanager = new \OrgManager\ApiClient\OrgManager($client, $token);
```

or you can skip the token and use the `connect()` method later

``` php
$client = new \GuzzleHttp\Client();

$token = 'YOUR_ORGMANAGER_API_TOKEN';

$orgmanager = new \OrgManager\ApiClient\OrgManager($client);

$orgmanager->connect($token);
```

### Get User info
``` php
$orgmanager->getUser();
```

### Get User Orgs
``` php
$orgmanager->getOrgs();
```

### Get Org info
``` php
$orgmanager->getOrg('ORG_ID');
```

### Change Org Password
``` php
$orgmanager->changeOrgPassword('ORG_ID', 'NEW_PASSWORD');
```

### Update Org
``` php
$orgmanager->updateOrg('ORG_ID');
```

### Delete Org
``` php
$orgmanager->deleteOrg('ORG_ID');
```

### Get Stats
``` php
$orgmanager->getStats();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email soy@miguelpiedrafita.com instead of using the issue tracker.

## Credits

- [Miguel Piedrafita](https://github.com/m1guelpf)
- [All Contributors](../../contributors)

## License

The Mozilla Public License 2.0 (MPL-2.0). Please see [License File](LICENSE.md) for more information.
