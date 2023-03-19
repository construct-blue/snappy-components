<?php

declare(strict_types=1);

namespace SnappyComponents\Strategy;

use SnappyComponents\Capture;
use SnappyComponents\HTML\Slot;
use SnappyRenderer\NextStrategy;
use SnappyRenderer\Renderer;
use SnappyRenderer\Strategy;

class RenderSlots implements Strategy
{
    private Strategy $strategy;

    /** @var Capture[] */
    private array $captures = [];
    /** @var Slot[] */
    private array $slots = [];

    /**
     * @param Strategy $strategy
     */
    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function render($element, object $model, Renderer $renderer, NextStrategy $next): string
    {
        if ($element instanceof Capture) {
            $this->captures[] = $element;
            return '';
        }

        $result = $this->strategy->render($element, $model, $renderer, $next);

        if ($element instanceof Slot) {
            $this->slots[$element->getName()] = $result;
        }

        $placeholders = [];
        $replacements = [];

        foreach ($this->captures as $capture) {
            $placeholders[$capture->getSlot()] = $this->slots[$capture->getSlot()];
            if (!$capture->isReplace() && isset($replacements[$capture->getSlot()])) {
                $replacements[$capture->getSlot()] .= (new Renderer($this->strategy, $next))->render($capture, $model);
            } else {
                $replacements[$capture->getSlot()] = (new Renderer($this->strategy, $next))->render($capture, $model);
            }
        }

        return str_replace($placeholders, $replacements, $result);
    }
}