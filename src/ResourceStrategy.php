<?php

declare(strict_types=1);

namespace SnappyComponents;

use Closure;
use ReflectionFunction;
use ReflectionObject;
use SnappyRenderer\NextStrategy;
use SnappyRenderer\Renderer;
use SnappyRenderer\Strategy;

class ResourceStrategy implements Strategy
{
    private Strategy $strategy;

    private array $names = [];

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
    public function getNames(): array
    {
        return $this->names;
    }

    public function render(mixed $element, object $model, Renderer $renderer, NextStrategy $next): string
    {
        if ($element instanceof Closure) {
            $reflection = new ReflectionFunction($element);
            foreach ($reflection->getAttributes(Resource::class) as $attribute) {
                $this->names[] = $attribute->getArguments()[0];
            }
        } else if (is_object($element)) {
            $reflection = new ReflectionObject($element);
            foreach ($reflection->getAttributes(Resource::class) as $attribute) {
                $this->names[] = $attribute->getArguments()[0];
            }
        }

        return $this->strategy->render($element, $model, $renderer, $next);
    }
}