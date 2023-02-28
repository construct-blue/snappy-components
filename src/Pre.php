<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * The Preformatted Text element
 */
class Pre implements Renderable
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
        yield '<pre>';
        yield $this->element;
        yield '</pre>';
    }
}