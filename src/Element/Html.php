<?php

declare(strict_types=1);

namespace SnappyComponents\Element;

use SnappyComponents\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Html implements Renderable
{
    private Element $element;

    /**
     * @param string $lang
     * @param Head $head
     * @param Body $body
     */
    public function __construct(string $lang, Head $head, Body $body)
    {
        $this->element = new Element('html', [$head, $body]);
        $this->element->setAttribute('lang', $lang);
    }
    public function render(object $model): iterable
    {
        yield $this->element;
    }
}