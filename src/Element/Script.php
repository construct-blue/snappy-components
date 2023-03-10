<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

class Script implements Renderable
{
    private Element $element;

    /**
     * @param $content
     */
    public function __construct(...$content)
    {
        $this->element = new Element('script', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}