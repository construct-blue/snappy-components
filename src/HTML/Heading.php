<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Heading implements Renderable
{
    private HTMLElement $element;

    /**
     * @param int $level
     * @param $content
     */
    public function __construct(int $level, ...$content)
    {
        $this->element = new HTMLElement("h$level", $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}