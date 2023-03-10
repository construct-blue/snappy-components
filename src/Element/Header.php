<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyRenderer\Renderable;

/***
 * @phpstan-import-type element from Renderable
 */
class Header implements Renderable
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
        yield '<header>';
        yield $this->element;
        yield '</header>';
    }
}