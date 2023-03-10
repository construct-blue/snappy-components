<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use PHPUnit\Framework\TestCase;
use SnappyComponents\Element;
use SnappyRenderer\Renderer;

class ElementTest extends TestCase
{
    public function testShouldRenderTagWithAttributesAndClasses()
    {
        $element = new Element('p', 'Hello world!', 'foo bar');
        $element->setAttribute('id', 'test');
        $element->toggleAttribute('disabled');
        $renderer = new Renderer();
        $result = $renderer->render($element, (object)[]);
        $this->assertEquals('<p class="foo bar" id="test" disabled>Hello world!</p>', $result);
    }
}
