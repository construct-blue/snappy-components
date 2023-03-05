<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Li implements Renderable
{
    /**
     * @var element
     */
    private $element;

    /**
     * @param element $element
     */
    public function __construct($element)
    {
        $this->element = $element;
    }

    public function render(object $model): iterable
    {
        yield '<li>';
        yield $this->element;
        yield '</li>';
    }
}