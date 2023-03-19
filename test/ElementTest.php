<?php

declare(strict_types=1);

namespace SnappyComponentsTest;

use PHPUnit\Framework\TestCase;
use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderer;

class ElementTest extends TestCase
{
    public function testShouldRenderTagWithAttributesAndClasses()
    {
        $element = new HTMLElement('p', 'Hello world!');
        $element->addCSSClass('foo', 'bar');
        $element->setHTMLAttribute('id', 'test');
        $element->toggleHTMLAttribute('disabled');
        $renderer = new Renderer();
        $result = $renderer->render($element, (object)[]);
        $this->assertEquals('<p id="test" class="foo bar" disabled>Hello world!</p>', $result);
    }
}
