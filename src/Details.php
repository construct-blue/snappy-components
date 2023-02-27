<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Details implements Renderable
{
    /** @var element */
    private $summary;
    /** @var element */
    private $element;

    /**
     * @param element $summary
     * @param element $element
     */
    public function __construct($summary, $element)
    {
        $this->summary = $summary;
        $this->element = $element;
    }

    public function render(object $model): iterable
    {
        yield '<details>';
        yield '<summary>';
        yield $this->summary;
        yield '</summary>';
        yield $this->element;
        yield '</details>';
    }
}