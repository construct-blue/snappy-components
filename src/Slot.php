<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

class Slot implements Renderable
{
    private string $code;

    /**
     * @param string $code
     */
    public function __construct(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    public function render(object $model): iterable
    {
        return [
            <<<HTML
<slot name="$this->code"></slot>
HTML
        ];
    }
}