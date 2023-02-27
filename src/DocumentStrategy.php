<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\NextStrategy;
use SnappyRenderer\Renderer;
use SnappyRenderer\RenderPipeline;
use SnappyRenderer\Strategy;

class DocumentStrategy implements Strategy
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
        $renderer = new Renderer(new SlotStrategy($this->strategy), $next);
        $this->document->setHead(new Slot('head'));
        $this->document->setBody($element);
        return $renderer->render($this->document, $model);
    }
}
