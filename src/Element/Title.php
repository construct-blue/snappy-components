<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

class Title implements Renderable
{
    private Element $element;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->element = new Element('title', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}