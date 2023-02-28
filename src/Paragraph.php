<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * The Paragraph element
 */
class Paragraph implements Renderable
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
        yield '<p>';
        yield $this->element;
        yield '</p>';
    }
}