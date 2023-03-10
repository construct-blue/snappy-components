<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

class Section implements Renderable
{
    private Element $element;

    /**
     * @param $content
     */
    public function __construct(...$content)
    {
        $this->element = new Element('section', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}