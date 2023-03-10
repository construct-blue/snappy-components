<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Slot implements Renderable
{
    private Element $element;

    /**
     * @param string $name
     * @param null|element $content
     */
    public function __construct(string $name, ...$content)
    {
        $this->element = new Element('slot', $content);
        $this->element->setAttribute('name', $name);
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