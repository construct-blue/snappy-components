<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Anchor implements Renderable
{
    private Element $element;

    /**
     * @param string $href
     * @param element $content
     */
    public function __construct(string $href, ...$content)
    {
        $this->element = new Element('a', $content);
        $this->element->setAttribute('href', $href);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}