<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

class Heading implements Renderable
{
    private int $level;
    private $element;

    /**
     * @param int $level
     * @param $element
     */
    public function __construct(int $level, $element)
    {
        $this->level = $level;
        $this->element = $element;
    }

    public function render(object $model): iterable
    {
        yield "<h$this->level>";
        yield $this->element;
        yield "</h$this->level>";
    }
}