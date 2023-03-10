<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Ul implements Renderable
{
    private Element $element;

    /**
     * @param Li ...$items
     */
    public function __construct(Li ...$items)
    {
        $this->element = new Element('ul', $items);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}