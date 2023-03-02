<?php

declare(strict_types=1);

namespace SnappyComponents\Helper;

use SnappyRenderer\Stringable;

class ClassList implements Stringable
{
    private array $classes = [];

    public function __construct(string $classes = '')
    {
        if ($classes !== '') {
            $this->classes = array_filter(explode(' ', $classes));
        }
    }

    public function add(string ...$class): self
    {
        $this->classes = array_merge($this->classes, $class);
        return $this;
    }

    public function remove(string ...$class): self
    {
        foreach ($class as $c) {
            unset($this->classes[array_search($c, $this->classes, true)]);
        }
        return $this;
    }

    public function has(string $class): bool
    {
        return in_array($class, $this->classes, true);
    }

    public function toArray(): array
    {
        return $this->classes;
    }

    public function __toString()
    {
        return implode(' ', $this->classes);
    }
}