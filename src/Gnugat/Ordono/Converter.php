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

/**
 * Responsible of converting the input into an array.
 *
 * @api
 */
interface Converter
{
    /**
     * @param mixed $options
     *
     * @return bool
     *
     * @api
     */
    public function supports($options);

    /**
     * @param mixed $options
     *
     * @return array
     *
     * @api
     */
    public function convert($options);
}
