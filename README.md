#Breadcrumb
A simple php library to manage breadcrumb.

## Installation

The suggested installation method is via [composer](https://getcomposer.org/):

```sh
php composer.phar require "candrianarijaona/breadcrumb:~1.0"
```

## Usage

Here is a simple usage of the library :

```php
$breadcrumb = new \Candrianarijaona\Breadcrumb\Breadcrumb('Home');
$breadcrumb->push('Category', '/category');
$breadcrumb->push('Article', '/category/article');

print_r($breadcrumb->toArray());
```

## Contributing

Feel free to share your feedback via pull requests or issues (it's very important to me).

## Credits

This library is licensed under [MIT](https://opensource.org/licenses/MIT) Licence.
