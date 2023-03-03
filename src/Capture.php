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
    private bool $replace;

    /**
     * @var element
     */
    private $content;

    /**
     * @param string $slot
     * @param element $content
     * @param bool $replace
     */
    public function __construct(string $slot, $content, bool $replace = false)
    {
        $this->slot = $slot;
        $this->content = $content;
        $this->replace = $replace;
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
    public function isReplace(): bool
    {
        return $this->replace;
    }

    public function render(object $model): iterable
    {
        yield $this->content;
    }
}