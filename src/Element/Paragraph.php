<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * The Paragraph element
 */
class Paragraph implements Renderable
{
    private Element $element;

    /**
     * @param $content
     */
    public function __construct(...$content)
    {
        $this->element = new Element('p', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}