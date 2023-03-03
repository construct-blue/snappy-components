<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

class Slot implements Renderable
{
    private string $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function render(object $model): iterable
    {
        return [
            <<<HTML
<slot name="$this->name"></slot>
HTML
        ];
    }
}