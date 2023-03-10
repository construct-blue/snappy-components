<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

class Summary implements Renderable
{
    private Element $element;
    public function __construct(...$content)
    {
        $this->element = new Element('summary', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}