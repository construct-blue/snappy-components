<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

class Span implements Renderable
{
    private string $content;

    private string $slot = '';

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /**
     * @param string $slot
     * @return Span
     */
    public function setSlot(string $slot): Span
    {
        $this->slot = $slot;
        return $this;
    }

    public function render(object $model): iterable
    {
        $element = new Element('span', $this->content);
        $element->setAttribute('slot', $this->slot);
        yield $element;
    }
}