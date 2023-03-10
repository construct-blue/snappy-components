<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyRenderer\Renderable;

class Title implements Renderable
{
    private string $content;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function render(object $model): iterable
    {
        yield "<title>$this->content</title>";
    }
}