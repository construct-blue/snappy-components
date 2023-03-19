<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyComponents\Helper\HTMLAttributeMap;
use SnappyComponents\Helper\CSSClassList;

trait HTMLElementTrait
{
    private HTMLAttributeMap $attributeMap;
    private CSSClassList $classList;

    protected function getAttributeMap(): HTMLAttributeMap
    {
        if (!isset($this->attributeMap)) {
            $this->attributeMap = new HTMLAttributeMap();
        }
        return $this->attributeMap;
    }

    protected function getClassList(): CSSClassList
    {
        if (!isset($this->classList)) {
            $this->classList = new CSSClassList();
        }
        return $this->classList;
    }

    public function setHTMLAttribute(string $name, string $value): self
    {
        $this->getAttributeMap()->set($name, $value);
        return $this;
    }

    /**
     * @param string $name
     * @param bool|null $force
     * @return bool
     */
    public function toggleHTMLAttribute(string $name, bool $force = null): bool
    {
        return $this->getAttributeMap()->toggle($name, $force);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function removeHTMLAttribute(string $name): self
    {
        $this->getAttributeMap()->remove($name);
        return $this;
    }

    public function getAttribute(string $name): ?string
    {
        return $this->getAttributeMap()->get($name);
    }

    public function addCSSClass(string ...$class): self
    {
        $this->getClassList()->add(...$class);
        return $this;
    }

    public function removeCSSClass(string ...$class): self
    {
        $this->getClassList()->remove(...$class);
        return $this;
    }

}