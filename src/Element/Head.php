<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * The Document Metadata (Header) element
 * @phpstan-import-type element from Renderable
 */
class Head implements Renderable
{
    private Element $element;

    /**
     * @param element $content
     */
    public function __construct(Title $title, ...$content)
    {
        $this->element = new Element('head', [$title, $content]);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}