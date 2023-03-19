<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Code implements Renderable
{
    private HTMLElement $element;

    /**
     * @param element $content
     */
    public function __construct(...$content)
    {
        $this->element = new HTMLElement('code', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}