<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * The Document Metadata (Header) element
 * @phpstan-import-type element from Renderable
 */
class Head implements Renderable
{
    private HTMLElement $element;

    /**
     * @param element $content
     */
    public function __construct(Title $title, ...$content)
    {
        $this->element = new HTMLElement('head', [$title, $content]);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}