<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\VoidElement;
use SnappyRenderer\Renderable;

class Meta implements Renderable
{
    private VoidElement $element;


    public function __construct(array $attributes = [])
    {
        $this->element = new VoidElement('meta');
        foreach ($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }
    }

    public function setAttribute(string $name, string $value): self
    {
        $this->element->setAttribute($name, $value);
        return $this;
    }

    public function render(object $model): iterable
    {
        yield $this->element;
    }
}