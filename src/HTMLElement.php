<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class HTMLElement implements Renderable, HTMLAttributeAware, CSSClassAware
{
    use HTMLElementTrait;

    private string $tag;

    /**
     * @var element
     */
    private $content;

    /**
     * @param string $tag
     * @param element $content
     */
    public function __construct(string $tag, $content)
    {
        $this->tag = $tag;
        $this->content = $content;
    }

    /**
     * @param object $model
     * @return iterable
     */
    public function render(object $model): iterable
    {
        $this->getAttributeMap()->set('class', (string)$this->getClassList());
        yield "<$this->tag{$this->getAttributeMap()}>";
        yield $this->content;
        yield "</$this->tag>";
    }
}