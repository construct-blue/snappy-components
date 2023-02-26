<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\NextStrategy;
use SnappyRenderer\Renderer;
use SnappyRenderer\Strategy;

class DocumentStrategy implements Strategy
{
    private ResourceStrategy $strategy;
    private Document $document;

    public function __construct(Document $document, Strategy $strategy = null)
    {
        $this->document = $document;
        $this->strategy = new ResourceStrategy($strategy ?? new Strategy\Pipeline\Pipe());
    }

    public function render($element, object $model, Renderer $renderer, NextStrategy $next): string
    {
        $body = $this->strategy->render($element, $model, $renderer, $next);
        $this->document->setBody([$body]);
        return (new Renderer($this->strategy))->render($this->document, $model);
    }
}
