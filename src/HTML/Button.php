<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * The Button element
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button
 * @phpstan-import-type element from Renderable
 */
class Button implements Renderable
{
    private HTMLElement $element;

    /**
     * @param element $content
     */
    public function __construct(...$content)
    {
        $this->element = new HTMLElement('button', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}