<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Style implements Renderable
{
    private HTMLElement $element;

    public function __construct(...$css)
    {
        $this->element = new HTMLElement('style', $css);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}