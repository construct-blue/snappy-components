<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLAttributeAware;
use SnappyComponents\VoidHTMLElement;
use SnappyRenderer\Renderable;

class Meta implements Renderable, HTMLAttributeAware
{
    private VoidHTMLElement $element;


    public function __construct(array $attributes = [])
    {
        $this->element = new VoidHTMLElement('meta');
        foreach ($attributes as $name => $value) {
            $this->setHTMLAttribute($name, $value);
        }
    }

    public function setHTMLAttribute(string $name, string $value): self
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