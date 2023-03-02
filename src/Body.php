<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyComponents\Helper\Element;
use SnappyRenderer\Renderable;

/**
 * The Document Body element
 */
class Body implements Renderable
{
    private string $lang;

    private Element $element;

    /**
     * @param string $lang
     * @param $content
     */
    public function __construct(string $lang, $content)
    {
        $this->lang = $lang;
        $this->element = new Element('body', $content);
    }

    public function render(object $model): iterable
    {
        $this->element->setAttribute('lang', $this->lang);
        yield $this->element;
    }
}