<?php

declare(strict_types=1);

namespace SnappyComponents;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
class Resource
{
    public function __construct(string $name)
    {
    }
}