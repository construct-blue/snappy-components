<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * The Document Metadata (Header) element
 * @phpstan-import-type element from Renderable
 */
class Head implements Renderable
{
    /**
     * @var element
     */
    private $content;

    /**
     * @param element $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    public function render(object $model): iterable
    {
        yield '<head>';
        yield $this->content;
        yield '</head>';
    }
}