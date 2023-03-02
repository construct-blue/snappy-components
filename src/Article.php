<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyComponents\Helper\Element;
use SnappyRenderer\Renderable;

class Article implements Renderable
{
    private Element $element;

    /**
     * @param $content
     */
    public function __construct($content)
    {
        $this->element = new Element('article', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}