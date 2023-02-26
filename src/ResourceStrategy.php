<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\NextStrategy;
use SnappyRenderer\Renderer;
use SnappyRenderer\Strategy;

class ResourceStrategy implements Strategy
{
    private Strategy $strategy;

    private array $resources = [];

    /**
     * @param Strategy $strategy
     */
    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @return array
     */
    public function getResources(): array
    {
        return array_values($this->resources);
    }

    public function render($element, object $model, Renderer $renderer, NextStrategy $next): string
    {
        if ($element instanceof Resource) {
            $code = $element->getCode();
            if (!isset($this->resources[$code])) {
                $this->resources[$code] = $code;
            }
            return '';
        }

        return $this->strategy->render($element, $model, $renderer, $next);
    }
}