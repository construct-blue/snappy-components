<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyRenderer\Renderable;

class Section implements Renderable
{
    private $element;

    /**
     * @param $element
     */
    public function __construct($element)
    {
        $this->element = $element;
    }

    public function render(object $model): iterable
    {
        yield '<section>';
        yield $this->element;
        yield '</section>';
    }
}