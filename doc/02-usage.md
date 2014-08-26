# Usage

Ordono provides 1 class and 2 interfaces:

* [Creating Command](#creating-command)
* [Using CommandResolver](#using-commandresolver)
* [Creating Converter](#creating-converter)

## Creating Command

For each input we wish to validate, we need to create a `Command`:

```php
<?php

use Gnugat\Ordono\Command;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CreateQuoteCommand implements Command
{
    public function configure(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(array(
            'content',
            'author',
        ));
        $resolver->setAllowedTypes(array(
            'content' => array('string'),
            'author' => array('string'),
        ));
    }
}
```

## Using CommandResolver

We can then validate the received input:

```php
<?php

use Gnugat\Ordono\CommandResolver;

$input = array(
    'content' => 'Ni!',
    'author' => 'KnightOfNi',
);

$commandResolver = new CommandResolver();
$command = new CreateQuoteCommand();
$commandResolver->resolve($command, $input);
```

## Creating Converter

If the input is something else than an array (for example a
[Symfony2](http://symfony.com/) `Request`), we must create a converter:

```php
<?php

use Gnugat\Ordono\Converter;

class Symfony2RequestConverter implements Converter
{
    public function supports($options)
    {
        return ($options instanceof \Symfony\Component\HttpFoundation\Request);
    }

    public function convert($options)
    {
        $parameters = $options->request->all();

        return $parameters;
    }
}
```

This converter should be added to the `CommandResolver`:

```php
<?php

use Gnugat\Ordono\CommandResolver;

$input = array(
    'content' => 'Ni!',
    'author' => 'KnightOfNi',
);

$commandResolver = new CommandResolver();
$commandResolver->addConverter(new Symfony2RequestConverter());
$command = new CreateQuoteCommand();
$commandResolver->resolve($command, $input);
```

## Next readings

* [reference](03-reference.md)
* [OptionsResolver](04-options-resolver.md)

## Previous readings

* [introduction](01-introduction.md)
