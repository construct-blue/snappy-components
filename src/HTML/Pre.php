<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * The Preformatted Text element
 * @phpstan-import-type element from Renderable
 */
class Pre implements Renderable
{
    private HTMLElement $element;

    /**
     * @param HTMLElement $content
     */
    public function __construct(...$content)
    {
        $this->element = new HTMLElement('pre', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}