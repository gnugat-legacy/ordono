# Ordono

Simple input validation.

You'll no longer have to do the following:

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

With Ordono, keep a clean validation:

```php
use Gnugat\Ordono\CommandResolver;

$command = new CreateQuoteCommand(); // Definition of a valid input
$commandResolver = new CommandResolver();
// $commandResolver->addConverter(new Symfony2RequestConverter());
$commandResolver->resolve($command, $input); // Throws exceptions if something is wrong
```

## Installation

Use [Composer](https://getcomposer.org/) to install Ordono in your project:

    composer require gnugat/ordono:~1.0

## Further documentation

You can see the current and past versions using one of the following:

* the `git tag` command
* the [releases page on Github](https://github.com/gnugat/ordono/releases)
* the file listing the [changes between versions](CHANGELOG.md)

You can find more documentation at the following links:

* [copyright and MIT license](LICENSE)
* [versioning and branching models](VERSIONING.md)
* [contribution instructions](CONTRIBUTING.md)
* [documentation directory](doc)

## Next readings

* [Introduction](./doc/01-introduction.md)
* [Usage](./doc/02-usage.md)
* [Reference](./doc/03-reference.md)
* [OptionsResolver](./doc/04-options-resolver.md)
