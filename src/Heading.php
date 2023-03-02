<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyComponents\Helper\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Heading implements Renderable
{
    private Element $element;

    /**
     * @param int $level
     * @param $content
     */
    public function __construct(int $level, $content)
    {
        $this->element = new Element("h$level", $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}