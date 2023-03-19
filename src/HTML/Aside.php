<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

class Aside implements Renderable
{
    private HTMLElement $element;

    public function __construct(...$content)
    {
        $this->element = new HTMLElement('aside', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}