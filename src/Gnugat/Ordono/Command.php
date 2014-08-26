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

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Responsible of defining the option constraints (required, type, etc).
 *
 * @api
 */
interface Command
{
    /**
     * @param OptionsResolverInterface $resolver
     *
     * @api
     */
    public function configure(OptionsResolverInterface $resolver);
}
