<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * The Paragraph element
 */
class Paragraph implements Renderable
{
    private HTMLElement $element;

    /**
     * @param $content
     */
    public function __construct(...$content)
    {
        $this->element = new HTMLElement('p', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}