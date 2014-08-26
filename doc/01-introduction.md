# Introduction

Built on the shoulder of the [Symfony2 OptionsResolver Component](http://symfony.com/doc/current/components/options_resolver.html),
heavily inspired by:

* the [Symfony2 Form Component](http://symfony.com/doc/current/components/form/introduction.html)
* [Octivi](http://octivi.com/)'s way of [retrieving request data](http://symfony.com/blog/push-it-to-the-limits-symfony2-for-high-performance-needs#retrieving-requests-data-optionsresolver-component)
* [Richard Miller](http://richardmiller.co.uk/)'s talk on [Avoiding The Mud](https://speakerdeck.com/richardmiller/avoiding-the-mud)

The input is considered as being a command: you should do something from its
parameters. Ordono provides you with:

* a `CommandResolver` class, responsible of validating the input
* a `Command` interface, responsible of defining the option constraints (required, type, etc)
* a `Converter` interface, in case your input is not an array

## What's the point?

Saves you from typing never-ending `if` statetments and provides a way to
convert input into array.

### Example

Let's consider the following array:

```php
$input = array(
    'content' => 'Ni!',
    'author' => 'KnightOfNi',
);
```

With Flat PHP, we would have something similar to:

```php
if (!isset($input['content'])) {
    throw new \RuntimeException('The required option "content" is missing.');
}
if (!is_string($input['content'])) {
    throw new \RuntimeException('The option "content" is expected to be of type "string"');
}
if (!isset($input['author'])) {
    throw new \RuntimeException('The required option "author" is missing.');
}
if (!is_string($input['author'])) {
    throw new \RuntimeException('The option "author" is expected to be of type "string"');
}
```

With the OptionsResolver:

```php
use Symfony\Component\OptionsResolver\OptionsResolver;

$resolver = new OptionsResolver();
$resolver->setRequired(array(
    'content',
));
$resolver->setAllowedTypes(array(
    'content' => array('string'),
));
$resolver->resolve($input);
```

With Ordono:

```php
use Gnugat\Ordono\CommandResolver;

$commandResolver = new CommandResolver();
$command = new CreateQuoteCommand(); // Definition of a valid input
$commandResolver->resolve($command, $input); // Throws exceptions if something is wrong
```

## Next readings

* [usage](02-usage.md)
* [reference](03-reference.md)
* [OptionsResolver](04-options-resolver.md)
