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
 * When the input given to the CommandResolver isn't an array and the resolver
 * doesn't have any converter supporting its type.
 *
 * @api
 */
class UnsupportedException extends \RuntimeException
{
}
