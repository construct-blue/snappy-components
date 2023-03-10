<?php

declare(strict_types=1);

namespace SnappyComponents\Strategy;

use SnappyComponents\Document;
use SnappyComponents\Element\Slot;
use SnappyRenderer\NextStrategy;
use SnappyRenderer\Renderer;
use SnappyRenderer\RenderPipeline;
use SnappyRenderer\Strategy;

class RenderDocument implements Strategy
{
    private Strategy $strategy;
    private Document $document;

    public function __construct(Document $document, Strategy $strategy = null)
    {
        $this->document = $document;
        $this->strategy = $strategy ?? new RenderPipeline();
    }

    public function render($element, object $model, Renderer $renderer, NextStrategy $next): string
    {
        $renderer = new Renderer(new RenderSlots($this->strategy), $next);
        $this->document->setHead(new Slot('head'));
        $this->document->setBody($element);
        return $renderer->render($this->document, $model);
    }
}
