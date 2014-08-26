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

use Gnugat\Ordono\Command;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Given a content
 * When I submit it
 * Then a quote should be created
 */
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
