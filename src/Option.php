<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

class Option implements Renderable
{
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function render(object $model): iterable
    {
        yield "<option value=\"$this->value\"></option>";
    }
}