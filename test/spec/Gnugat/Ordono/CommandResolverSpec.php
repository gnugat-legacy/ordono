<?php

/*
 * This file is part of the Ordono project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Gnugat\Ordono;

use Gnugat\Ordono\Command;
use Gnugat\Ordono\Converter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandResolverSpec extends ObjectBehavior
{
    function it_resolves_commands(Command $command)
    {
        $options = array('content' => 'No one expects the Spanish Inquisition!');

        $optionsResolverType = 'Symfony\Component\OptionsResolver\OptionsResolver';
        $command->configure(Argument::type($optionsResolverType))->shouldBeCalled();

        $invalidOptionsExceptionType = 'Symfony\Component\OptionsResolver\Exception\InvalidOptionsException';
        $this->shouldThrow($invalidOptionsExceptionType)->duringResolve($command, $options);
    }

    function it_can_have_converters(Command $command, Converter $converter)
    {
        $input = new \StdClass();
        $options = array('content' => 'No one expects the Spanish Inquisition!');

        $this->addConverter($converter);
        $converter->supports($input)->willReturn(true);
        $converter->convert($input)->willReturn($options);

        $optionsResolverType = 'Symfony\Component\OptionsResolver\OptionsResolver';
        $command->configure(Argument::type($optionsResolverType))->shouldBeCalled();

        $invalidOptionsExceptionType = 'Symfony\Component\OptionsResolver\Exception\InvalidOptionsException';
        $this->shouldThrow($invalidOptionsExceptionType)->duringResolve($command, $input);
    }

    function it_throws_when_unsupported_type(Command $command, Converter $converter)
    {
        $input = new \StdClass();
        $options = array('content' => 'No one expects the Spanish Inquisition!');

        $this->addConverter($converter);
        $converter->supports($input)->willReturn(false);

        $optionsResolverType = 'Symfony\Component\OptionsResolver\OptionsResolver';
        $command->configure(Argument::type($optionsResolverType))->shouldNotBeCalled();

        $invalidOptionsExceptionType = 'Gnugat\Ordono\UnsupportedException';
        $this->shouldThrow($invalidOptionsExceptionType)->duringResolve($command, $input);
    }
}
