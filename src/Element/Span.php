<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

class Span implements Renderable
{
    private Element $element;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->element = new Element('span', $content);
    }

    /**
     * @param string $slot
     * @return Span
     */
    public function setSlot(string $slot): Span
    {
        $this->element->setAttribute('slot', $slot);
        return $this;
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}