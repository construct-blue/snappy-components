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

    /**
     * @var element
     */
    private $element;

    /**
     * @param string $slot
     * @param element $element
     */
    public function __construct(string $slot, $element)
    {
        $this->slot = $slot;
        $this->element = $element;
    }

    /**
     * @return string
     */
    public function getSlot(): string
    {
        return $this->slot;
    }

    /**
     * @return element
     */
    public function getElement()
    {
        return $this->element;
    }

    public function render(object $model): iterable
    {
        return [];
    }
}