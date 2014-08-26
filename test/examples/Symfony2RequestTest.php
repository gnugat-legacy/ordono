<?php

/*
 * This file is part of the Ordono project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace examples\Gnugat\Ordono;

use fixtures\Gnugat\Ordono\CreateQuoteCommand;
use fixtures\Gnugat\Ordono\Symfony2RequestConverter;
use Gnugat\Ordono\CommandResolver;
use Symfony\Component\HttpFoundation\Request;

class Symfony2RequestTest extends \PHPUnit_Framework_TestCase
{
    private $commandResolver;

    public function setUp()
    {
        $this->commandResolver = new CommandResolver();
        $this->commandResolver->addConverter(new Symfony2RequestConverter());
    }

    public function testValid()
    {
        $input = array(
            'content' => 'Ni!',
            'author' => 'KnightOfNi',
        );
        $request = new Request(array(), $input);

        $data = $this->commandResolver->resolve(new CreateQuoteCommand(), $request);
    }

    /**
     * @expectedException        \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     * @expectedExceptionMessage The option "content" with value "42" is expected to be of type "string"
     */
    public function testInvalidType()
    {
        $input = array(
            'content' => 42,
            'author' => 'KnightOfNi',
        );
        $request = new Request(array(), $input);

        $data = $this->commandResolver->resolve(new CreateQuoteCommand(), $request);
    }

    /**
     * @expectedException        \Symfony\Component\OptionsResolver\Exception\MissingOptionsException
     * @expectedExceptionMessage The required option "content" is missing.
     */
    public function testMissingOption()
    {
        $input = array('author' => 'KnightOfNi');
        $request = new Request(array(), $input);

        $data = $this->commandResolver->resolve(new CreateQuoteCommand(), $request);
    }
}
