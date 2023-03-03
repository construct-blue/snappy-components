<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyComponents\Helper\Element;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class ShadowRoot implements Renderable
{
    private string $tag;

    /**
     * @var element
     */
    private $template;

    /**
     * @var element
     */
    private $content;

    /**
     * @param string $tag
     * @param element $template
     * @param element $content
     */
    public function __construct(string $tag, $template, $content)
    {
        $this->tag = $tag;
        $this->template = $template;
        $this->content = $content;
    }

    public function render(object $model): iterable
    {
        yield "<$this->tag>";
        yield new Element('template', $this->template);
        yield $this->content;
        yield new Script(
            <<<JS
var e = document.currentScript.parentElement;
if (!e.shadowRoot) {
    e.attachShadow({mode: "open"}).appendChild(e.firstElementChild.content);
}
JS
        );
        yield "</$this->tag>";
    }
}