# OptionsResolver

A highly opiniated [OptionsResolver](http://symfony.com/doc/current/components/options_resolver.html) cheat sheet.

* [API](#api)
* [Allowed types](#allowed-types)
* [Normalizers](#normalizers)

## API

```php
<?php

namespace Symfony\Component\OptionsResolver;

interface OptionsResolverInterface
{
    // $resolver->setDefaults(array('optionName' => 'defaultValue'));
    public function setDefaults(array $defaultValues);
    public function replaceDefaults(array $defaultValues);

    // $resolver->setOptional(array('optionName'));
    public function setOptional(array $optionNames);

    // $resolver->setRequired(array('optionName'));
    public function setRequired(array $optionNames);

    // $resolver->setAllowedValues(array('optionName' => array('value'));
    public function setAllowedValues(array $allowedValues);
    public function addAllowedValues(array $allowedValues);

    // $resolver->setAllowedTypes(array('optionName' => array('type'));
    public function setAllowedTypes(array $allowedTypes);
    public function addAllowedTypes(array $allowedTypes);

    public function setNormalizers(array $normalizers);

    public function resolve(array $options = array());
}
```

## Allowed types

Could be:

* a class name (use of `instanceof`)
* a `is_*` function (detects if the function exists and calls it)

Example of possible types: `integer`, `string`, `null`, `array`, `bool`.

## Normalizers

```php
use Symfony\Component\OptionsResolver\Options;

$resolver->setNormalizers(
    'id' => function (Options $options, $value) {
        return (int) $value;
    }
);
```

`Options` can be used as an array and contains the options with their values.

## Previous readings

* [introduction](01-introduction.md)
* [usage](02-usage.md)
* [reference](03-reference.md)
