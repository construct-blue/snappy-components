<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/***
 * @phpstan-import-type element from Renderable
 */
class Header implements Renderable
{
    private Element $element;

    /**
     * @param element $content
     */
    public function __construct(...$content)
    {
        $this->element = new Element('header', $content);
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}