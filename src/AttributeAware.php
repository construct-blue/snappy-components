<?php

declare(strict_types=1);

namespace SnappyComponents;

interface AttributeAware
{
    public function setAttribute(string $name, string $value): self;
    public function toggleAttribute(string $name, bool $force = null): bool;
    public function removeAttribute(string $name): self;
}