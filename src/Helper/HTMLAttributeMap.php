<?php

declare(strict_types=1);

namespace SnappyComponents\Helper;

use SnappyRenderer\Stringable;

class HTMLAttributeMap implements Stringable
{
    private array $attributes = [];
    private array $booleanAttributes = [];

    /**
     * @param string $name A string specifying the name of the attribute whose value is to be set. The attribute name is automatically converted to all lower-case.
     * @param string $value A string containing the value to assign to the attribute.
     * @return $this
     */
    public function set(string $name, string $value): self
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    /**
     * @param string $name A string specifying the name of the attribute to be toggled. The attribute name is automatically converted to all lower-case.
     *
     * @param bool|null $force A boolean value which has the following effects:
     * - if not specified at all, the toggle method "toggles" the attribute named name — removing it if it is present, or else adding it if it is not present
     * - if true, the toggle method adds an attribute named name
     * - if false, the toggle method removes the attribute named name
     * @return bool
     */
    public function toggle(string $name, bool $force = null): bool
    {
        if (null === $force) {
            $this->booleanAttributes[$name] = !($this->booleanAttributes[$name] ?? false);
        } else {
            $this->booleanAttributes[$name] = $force;
        }
        return $this->booleanAttributes[$name];
    }

    /**
     * @param string $name A string specifying the name of the attribute to remove from the element.
     * @return $this
     */
    public function remove(string $name): self
    {
        unset($this->booleanAttributes[$name]);
        return $this;
    }

    public function get(string $name): ?string
    {
        return $this->attributes[$name] ?? null;
    }

    public function has(string $name): bool
    {
        return $this->booleanAttributes[$name] ?? false;
    }

    public function __toString()
    {
        $attributes = '';

        foreach ($this->attributes as $key => $value) {
            if (isset($value) && isset($value[0])) {
                $key = strtolower($key);
                $attributes .= " $key=\"$value\"";
            }
        }

        foreach ($this->booleanAttributes as $attribute => $state) {
            if (true === $state) {
                $attribute = strtolower($attribute);
                $attributes .= " $attribute";
            }
        }

        return $attributes;
    }
}