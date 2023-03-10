<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

class Option implements Renderable
{
    private Element $element;

    public function __construct(string $value, string $content = '')
    {
        $this->element = new Element('option', $content);
        $this->element->setAttribute('value', $value);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}