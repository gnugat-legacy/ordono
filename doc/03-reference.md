# Reference

* [CommandResolver](#commandresolver)
* [Command](#command)
* [Converter](#converter)
* [OptionResolver](#optionresolver)

## CommandResolver

Responsible of validating the input.

```php
<?php

namespace Gnugat\Ordono;

use Gnugat\Ordono\Command;
use Gnugat\Ordono\UnsupportedException;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Exception\InvalidOptionsException;
use Symfony\Component\OptionsResolver\Exception\MissingOptionsException;

class CommandResolver
{
    /** @param Converter $converter */
    public function addConverter(Converter $converter);

    /**
     * @param Command $command
     * @param mixed   $options
     *
     * @return array The given options or the options converted into an array
     *
     * @throws UnsupportedException    If options isn't an array and cannot be converted
     * @throws InvalidOptionsException If any of the passed options has not been defined or does not contain an allowed value.
     * @throws MissingOptionsException If a required option is missing.
     */
    public function resolve(Command $command, $options);
}
```

## Command

To be implemented in order to define the option constraint of an input.

```php
<?php

namespace Gnugat\Ordono;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

interface Command
{
    /** @param  OptionsResolverInterface $resolver */
    public function configure(OptionsResolverInterface $resolver);
}
```

## Converter

To be implemented in order to convert an input into an array.

```php
<?php

namespace Gnugat\Ordono;

interface Converter
{
    /**
     * @param mixed $options
     *
     * @return bool
     */
    public function supports($options);

    /**
     * @param mixed $options
     *
     * @return array
     */
    public function convert($options);
}
```

## Previous readings

* [introduction](01-introduction.md)
* [usage](02-usage.md)
