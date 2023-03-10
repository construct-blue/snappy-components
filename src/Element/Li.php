<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Li implements Renderable
{
    private Element $element;

    /**
     * @param element $content
     */
    public function __construct(...$content)
    {
        $this->element = new Element('li', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}