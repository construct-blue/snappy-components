<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use SnappyComponents\VoidElement;
use PHPUnit\Framework\TestCase;
use SnappyRenderer\Renderer;

class VoidElementTest extends TestCase
{
    public function testShouldNotRenderClosingTagOrSlash()
    {
        $voidElement = new VoidElement('input');
        $renderer = new Renderer();

        self::assertEquals('<input>', $renderer->render($voidElement, (object)[]));
    }

    public function testShouldRenderAttributes()
    {
        $voidElement = new VoidElement('input');
        $voidElement->setAttribute('type', 'text');
        $voidElement->setAttribute('name', 'user');
        $voidElement->setAttribute('value', 'max');
        $voidElement->toggleAttribute('disabled');

        $renderer = new Renderer();

        $this->assertEquals('<input type="text" name="user" value="max" disabled>', $renderer->render($voidElement, (object)[]));
    }
}
