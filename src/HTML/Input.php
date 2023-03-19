<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLAttributeAware;
use SnappyComponents\VoidHTMLElement;
use SnappyRenderer\Renderable;

/**
 * The Input (Form Input) element
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input
 * @phpstan-import-type element from Renderable
 */
class Input implements Renderable, HTMLAttributeAware
{
    private VoidHTMLElement $element;

    public function __construct(array $attributes = [])
    {
        $this->element = new VoidHTMLElement('input');
        foreach ($attributes as $name => $value) {
            if (is_bool($value)) {
                $this->element->toggleHTMLAttribute($name, $value);
            } else {
                $this->element->setHTMLAttribute($name, $value);
            }
        }
    }

    public function setHTMLAttribute(string $name, string $value): HTMLAttributeAware
    {
        $this->element->setHTMLAttribute($name, $value);
        return $this;
    }

    public function toggleHTMLAttribute(string $name, bool $force = null): bool
    {
        return $this->element->toggleHTMLAttribute($name, $force);
    }

    public function removeHTMLAttribute(string $name): HTMLAttributeAware
    {
        $this->element->removeHTMLAttribute($name);
        return $this;
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}