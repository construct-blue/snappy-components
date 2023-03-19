<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use SnappyComponents\VoidHTMLElement;
use PHPUnit\Framework\TestCase;
use SnappyRenderer\Renderer;

class VoidElementTest extends TestCase
{
    public function testShouldNotRenderClosingTagOrSlash()
    {
        $voidElement = new VoidHTMLElement('input');
        $renderer = new Renderer();

        self::assertEquals('<input>', $renderer->render($voidElement, (object)[]));
    }

    public function testShouldRenderAttributes()
    {
        $voidElement = new VoidHTMLElement('input');
        $voidElement->setHTMLAttribute('type', 'text');
        $voidElement->setHTMLAttribute('name', 'user');
        $voidElement->setHTMLAttribute('value', 'max');
        $voidElement->toggleHTMLAttribute('disabled');

        $renderer = new Renderer();

        $this->assertEquals('<input type="text" name="user" value="max" disabled>', $renderer->render($voidElement, (object)[]));
    }
}
