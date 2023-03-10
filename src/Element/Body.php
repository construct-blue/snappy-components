<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * The Document Body element
 * @phpstan-import-type element from Renderable
 */
class Body implements Renderable
{
    private Element $element;

    /**
     * @param element $content
     */
    public function __construct(...$content)
    {
        $this->element = new Element('body', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}