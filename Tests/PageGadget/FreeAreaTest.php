<?php

/**
 * This file is applied CC0 <http://creativecommons.org/publicdomain/zero/1.0/>
 */

namespace SocietoPlugin\Societo\FreeAreaPlugin\Test\PageGadget;

use SocietoPlugin\Societo\FreeAreaPlugin\PageGadget\FreeArea;
use Societo\PageBundle\Entity\PageGadget;
use Societo\PageBundle\Entity\Page;

use Societo\BaseBundle\Test\WebTestCase;

class FreeAreaTest extends WebTestCase
{
    public function testRender()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();

        $content = $this->executeFreeArea(static::$kernel->getContainer())->getContent();

        $this->assertRegExp('#&lt;s&gt;CAPTION&lt;/s&gt;#', $content);
        $this->assertRegExp('#<s>BODY</s>#', $content);
        $this->assertRegExp('#data-gadget-name="SocietoFreeAreaPlugin:FreeArea"#', $content);
    }

    public function testGetOption()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();

        $freeArea = new FreeArea();

        $options = $freeArea->getOptions();
        $this->assertEquals(1, count($options));
    }

    public function executeFreeArea($container)
    {
        $gadget = new PageGadget(new Page('page'), 'head', 'SocietoFreeAreaPlugin:FreeArea', '<s>CAPTION</s>', array(
            'body' => '<s>BODY</s>',
        ));
        $freeArea = new FreeArea();
        $freeArea->setContainer($container);

        return $freeArea->execute($gadget, array(), array());
    }
}
