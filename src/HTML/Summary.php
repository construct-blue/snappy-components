<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

class Summary implements Renderable
{
    private HTMLElement $element;
    public function __construct(...$content)
    {
        $this->element = new HTMLElement('summary', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}