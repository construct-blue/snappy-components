<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyComponents\Helper\AttributeMap;
use SnappyComponents\Helper\ClassList;
use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Element implements Renderable, AttributeAware
{
    private string $tag;

    private AttributeMap $attributeMap;
    public ClassList $classList;

    /**
     * @var element
     */
    private $content;

    /**
     * @param string $tag
     * @param element $content
     * @param string $classes
     */
    public function __construct(string $tag, $content, string $classes = '')
    {
        $this->tag = $tag;
        $this->content = $content;
        $this->attributeMap = new AttributeMap();
        $this->classList = new ClassList($classes);
    }

    public function setAttribute(string $name, string $value): self
    {
        $this->attributeMap->set($name, $value);
        return $this;
    }

    /**
     * @param string $name
     * @param bool|null $force
     * @return bool
     */
    public function toggleAttribute(string $name, bool $force = null): bool
    {
        return $this->attributeMap->toggle($name, $force);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function removeAttribute(string $name): self
    {
        $this->attributeMap->remove($name);
        return $this;
    }

    public function getAttribute(string $name): ?string
    {
        return $this->attributeMap->get($name);
    }

    /**
     * @param object $model
     * @return iterable
     */
    public function render(object $model): iterable
    {
        $this->attributeMap->addClassList($this->classList);
        yield "<$this->tag$this->attributeMap>";
        yield $this->content;
        yield "</$this->tag>";
    }
}