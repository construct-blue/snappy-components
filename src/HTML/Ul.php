<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Ul implements Renderable
{
    private HTMLElement $element;

    /**
     * @param Li ...$items
     */
    public function __construct(Li ...$items)
    {
        $this->element = new HTMLElement('ul', $items);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}