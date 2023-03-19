<?php

declare(strict_types=1);

namespace SnappyComponents;

interface CSSClassAware
{
    public function addCSSClass(string ...$class): self;
    public function removeCSSClass(string ...$class): self;
}