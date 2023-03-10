<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Style implements Renderable
{
    private Element $element;

    public function __construct(...$css)
    {
        $this->element = new Element('style', $css);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}