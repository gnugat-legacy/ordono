<?php

/*
 * This file is part of the Ordono project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gnugat\Ordono;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Responsible of validating the input.
 *
 * @api
 */
class CommandResolver
{
    /** @var array */
    private $converters;

    /**
     * @param Converter $converter
     *
     * @api
     */
    public function addConverter(Converter $converter)
    {
        $this->converters[] = $converter;
    }

    /**
     * @param Command $command
     * @param mixed   $options
     *
     * @return array The given options or the options converted into an array
     *
     * @throws UnsupportedException                                                 If options isn't an array and cannot be converted
     * @throws \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException If any of the passed options has not been defined or does not contain an allowed value
     * @throws \Symfony\Component\OptionsResolver\Exception\MissingOptionsException If a required option is missing
     *
     * @api
     */
    public function resolve(Command $command, $options)
    {
        if (!is_array($options)) {
            $options = $this->convert($options);
        }
        $resolver = new OptionsResolver();
        $command->configure($resolver);

        $resolver->resolve($options);
    }

    /**
     * @param mixed $options
     *
     * @return array
     *
     * @throws UnsupportedException
     */
    private function convert($options)
    {
        foreach ($this->converters as $converter) {
            if ($converter->supports($options)) {
                return $converter->convert($options);
            }
        }
        throw new UnsupportedException('No converter found for given options');
    }
}
