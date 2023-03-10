<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Anchor implements Renderable
{
    private Element $element;

    private string $href;

    private string $target = '';

    /**
     * @param string $href
     * @param element $content
     */
    public function __construct(string $href, $content)
    {
        $this->element = new Element('a', $content);
        $this->href = $href;
    }

    public function render(object $model): iterable
    {
        $this->element->setAttribute('href', $this->href);
        $this->element->setAttribute('target', $this->target);
        yield $this->element;
    }
}