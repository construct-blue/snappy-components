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
    private bool $append;

    /**
     * @var element
     */
    private $content;

    /**
     * @param string $slot
     * @param element $content
     * @param bool $append
     */
    public function __construct(string $slot, $content, bool $append = false)
    {
        $this->slot = $slot;
        $this->content = $content;
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
        yield $this->content;
    }
}