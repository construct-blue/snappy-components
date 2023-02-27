<?php

declare(strict_types=1);

namespace SnappyComponents;

use SnappyRenderer\Renderable;

/**
 * @phpstan-import-type element from Renderable
 */
class Capture implements Renderable
{
    private string $slot;
    private bool $append = false;

    /**
     * @var element
     */
    private $element;

    /**
     * @param string $slot
     * @param element $element
     * @param bool $append
     */
    public function __construct(string $slot, $element, bool $append = false)
    {
        $this->slot = $slot;
        $this->element = $element;
        $this->append = $append;
    }

    /**
     * @return string
     */
    public function getSlot(): string
    {
        return $this->slot;
    }

    /**
     * @return bool
     */
    public function isAppend(): bool
    {
        return $this->append;
    }

    public function render(object $model): iterable
    {
        return [$this->element];
    }
}