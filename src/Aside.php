<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyComponents\Helper\Element;
use SnappyRenderer\Renderable;

class Aside implements Renderable
{
    private Element $element;

    public function __construct($content)
    {
        $this->element = new Element('aside', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}