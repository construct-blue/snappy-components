<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

class VoidHTMLElement implements Renderable, HTMLAttributeAware, CSSClassAware
{
    use HTMLElementTrait;

    private string $tag;

    /**
     * @param string $tag
     */
    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @param object $model
     * @return iterable
     */
    public function render(object $model): iterable
    {
        $this->getAttributeMap()->set('class', (string)$this->getClassList());
        yield "<$this->tag{$this->getAttributeMap()}>";
    }
}