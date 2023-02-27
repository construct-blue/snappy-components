<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\NextStrategy;
use SnappyRenderer\Renderer;
use SnappyRenderer\Strategy;

class SlotStrategy implements Strategy
{
    private Strategy $strategy;

    /**
     * @param Strategy $strategy
     */
    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function render($element, object $model, Renderer $renderer, NextStrategy $next): string
    {

        return $this->strategy->render($element, $model, $renderer, $next);
    }
}