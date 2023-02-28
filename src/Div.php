<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * The Content Division element
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/div
 * @phpstan-import-type element from Renderable
 */
class Div implements Renderable
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
        yield '<div>';
        yield $this->element;
        yield '</div>';
    }
}