<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

class Title implements Renderable
{
    private HTMLElement $element;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->element = new HTMLElement('title', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}