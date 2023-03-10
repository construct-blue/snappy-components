<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\AttributeAware;
use SnappyComponents\VoidElement;
use SnappyRenderer\Renderable;

/**
 * The Input (Form Input) element
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input
 * @phpstan-import-type element from Renderable
 */
class Input implements Renderable, AttributeAware
{
    private VoidElement $element;

    public function __construct(array $attributes = [])
    {
        $this->element = new VoidElement('input');
        foreach ($attributes as $name => $value) {
            if (is_bool($value)) {
                $this->element->toggleAttribute($name, $value);
            } else {
                $this->element->setAttribute($name, $value);
            }
        }
    }

    public function setAttribute(string $name, string $value): AttributeAware
    {
        $this->element->setAttribute($name, $value);
        return $this;
    }

    public function toggleAttribute(string $name, bool $force = null): bool
    {
        return $this->element->toggleAttribute($name, $force);
    }

    public function removeAttribute(string $name): AttributeAware
    {
        $this->element->removeAttribute($name);
        return $this;
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}