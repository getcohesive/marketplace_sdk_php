# League Skeleton

[![Latest Version](https://img.shields.io/github/release/getcohesive/marketplace_sdk_php.svg?style=flat-square)](https://github.com/getcohesive/marketplace_sdk_php/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/league/skeleton.svg?style=flat-square)](https://packagist.org/packages/cohesive/sdk)


This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require cohesive/sdk
```

## Usage

``` php
$sdk = new cohesive\sdk\CohesiveSDK(
    'https://example.com',
    'api_key',
    'app_id',
    'app_secret'
);
echo $sdk->validateToken($token);
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/getcohesive/marketplace_sdk_php/blob/master/CONTRIBUTING.md) for details.

## Credits

- [:author_name](https://github.com/:cohesive-chinmayrelkar)
- [All Contributors](https://github.com/getcohesive/marketplace_sdk_php/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
