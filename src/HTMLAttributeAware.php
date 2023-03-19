<?php

declare(strict_types=1);

namespace SnappyComponents;

interface HTMLAttributeAware
{
    public function setHTMLAttribute(string $name, string $value): self;
    public function toggleHTMLAttribute(string $name, bool $force = null): bool;
    public function removeHTMLAttribute(string $name): self;
}