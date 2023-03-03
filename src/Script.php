<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

class Script implements Renderable
{
    private $script;

    /**
     * @param $script
     */
    public function __construct($script)
    {
        $this->script = $script;
    }

    public function render(object $model): iterable
    {
        yield '<script>';
        yield $this->script;
        yield '</script>';
    }
}