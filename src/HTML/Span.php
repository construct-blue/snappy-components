<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

class Span implements Renderable
{
    private HTMLElement $element;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->element = new HTMLElement('span', $content);
    }

    /**
     * @param string $slot
     * @return Span
     */
    public function setSlot(string $slot): Span
    {
        $this->element->setHTMLAttribute('slot', $slot);
        return $this;
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}