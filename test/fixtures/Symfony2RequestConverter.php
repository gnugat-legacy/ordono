<?php

/*
 * This file is part of the Ordono project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace fixtures\Gnugat\Ordono;

use Gnugat\Ordono\Converter;

/**
 * Given a submitted form
 * When the request is sent
 * Then its form parameters should be converted
 */
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
