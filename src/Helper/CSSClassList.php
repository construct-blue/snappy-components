<?php

declare(strict_types=1);

namespace SnappyComponents\Helper;

use SnappyRenderer\Stringable;

class CSSClassList implements Stringable
{
    private array $classes = [];

    public function __construct(string $classes = null)
    {
        if (isset($classes)) {
            $this->add(...explode(' ', $classes));
        }
    }

    public function add(string ...$class): self
    {
        foreach ($class as $c) {
            $h = crc32($c);
            $this->classes[$h] = $c;
        }
        return $this;
    }

    public function remove(string ...$class): self
    {
        if (empty($class) || empty($this->classes)) {
            return $this;
        }

        foreach ($class as $c) {
            unset($this->classes[crc32($c)]);
        }

        return $this;
    }

    public function has(string $class): bool
    {
        if (empty($this->classes)) {
            return false;
        }
        return isset($this->classes[crc32($class)]);
    }

    public function __toString()
    {
        if (empty($this->classes)) {
            return '';
        }
        return implode(' ', $this->classes);
    }
}