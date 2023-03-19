<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Slot implements Renderable
{
    private HTMLElement $element;

    /**
     * @param string $name
     * @param null|element $content
     */
    public function __construct(string $name, ...$content)
    {
        $this->element = new HTMLElement('slot', $content);
        $this->element->setHTMLAttribute('name', $name);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->element->getAttribute('name');
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}