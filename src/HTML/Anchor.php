<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Anchor implements Renderable
{
    private HTMLElement $element;

    /**
     * @param string $href
     * @param HTMLElement $content
     */
    public function __construct(string $href, ...$content)
    {
        $this->element = new HTMLElement('a', $content);
        $this->element->setHTMLAttribute('href', $href);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}