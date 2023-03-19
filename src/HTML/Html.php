<?php

declare(strict_types=1);

namespace SnappyComponents\HTML;

use SnappyComponents\HTMLElement;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Html implements Renderable
{
    private HTMLElement $element;

    /**
     * @param string $lang
     * @param Head $head
     * @param Body $body
     */
    public function __construct(string $lang, Head $head, Body $body)
    {
        $this->element = new HTMLElement('html', [$head, $body]);
        $this->element->setHTMLAttribute('lang', $lang);
    }
    public function render(object $model): iterable
    {
        yield $this->element;
    }
}