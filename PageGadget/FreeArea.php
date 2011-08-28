<?php

namespace SocietoPlugin\Societo\FreeAreaPlugin\PageGadget;

use \Societo\PageBundle\PageGadget\AbstractPageGadget;

/**
 *
 * @author Kousuke Ebihara <ebihara@php.net>
 */
class FreeArea extends AbstractPageGadget
{
    protected $caption = 'Free Area';

    protected $description = 'Show a block of specified HTML contents';

    public function execute($gadget, $parentAttributes, $parameters)
    {
        return $this->render('SocietoFreeAreaPlugin:PageGadget:free_area.html.twig', array(
            'gadget' => $gadget,
        ));
    }

    public function getOptions()
    {
        return array(
            'body' => array(
                'type' => 'textarea',
            ),
        );
    }
}
