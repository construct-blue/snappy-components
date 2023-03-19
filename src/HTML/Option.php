<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

class Option implements Renderable
{
    private HTMLElement $element;

    public function __construct(string $value, string $content = '')
    {
        $this->element = new HTMLElement('option', $content);
        $this->element->setHTMLAttribute('value', $value);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}