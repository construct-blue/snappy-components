<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * The Details disclosure element
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details
 *
 * @phpstan-import-type element from Renderable
 */
class Details implements Renderable
{
    private Element $element;

    public function __construct(Summary $summary, ...$content)
    {
        $this->element = new Element('details', [$summary, $content]);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}