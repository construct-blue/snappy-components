<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * The Document Metadata (Header) element
 */
class Head implements Renderable
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
        yield '<head>';
        yield $this->element;
        yield '</head>';
    }
}